<?php

namespace MeituanUnion;

use MeituanUnion\request\Request;
use RuntimeException;
use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;

const GATEWAY = 'https://openapi.meituan.com';

class Client
{
    private $key;
    private $secret; // 应用secret
    private $callbackSecret; // 回调secret

    public function __construct(string $key = "", string $secret = "", string $callbackSecret = "")
    {
        $this->key = $key;
        $this->secret = $secret;
        $this->callbackSecret = $callbackSecret;
    }

    /**
     * 生成签名算法
     * @param array $params
     * @param bool $isCallback true回调验证使用，false接口验证
     * @return string
     */
    protected function sign(array $params, bool $isCallback = false): string
    {
        $secret = $isCallback ? $this->callbackSecret : $this->secret;
        unset($params["sign"]);
        ksort($params);
        $str = $secret; // $secret为分配的密钥
        foreach ($params as $key => $value) {
            $str .= $key . $value;
        }
        $str .= $secret;
        return md5($str);
    }

    /**
     * 验证回调结果
     * @param array $params
     * @return bool
     */
    public function validateCallback(array $params): bool
    {
        $sign = $params['sign'];
        if (isset($params['tradeTypeList'])) { // 优选订单回推验签处理
            $params['tradeTypeList'] = json_encode($params['tradeTypeList'], true);
        }
        return $this->sign($params, true) === $sign;
    }

    /**
     * @param Request $request
     * @return array
     * @throws GuzzleException|RuntimeException
     */
    public function execute(Request $request): array
    {
        $params = (array)$request;
        $ref = new \ReflectionClass($request);
        $url = $ref->getConstant('PATH');
        return $this->request($url, $params);
    }

    /**
     * @param string $path
     * @param array $params
     * @return array
     * @throws GuzzleException|RuntimeException
     */
    public function request(string $path, array $params): array
    {
        $params['appkey'] = $this->key;
        $params['ts'] = time();
        $params['sign'] = $this->sign($params);

        $client = new GuzzleClient(['base_uri' => GATEWAY, 'http_errors' => false]);
        try {
            $response = $client->request('GET', $path, ['query' => $params]);
        } catch (GuzzleException $e) {
            throw $e;
        }

        $body = $response->getBody();
        if ($body instanceof Stream) {
            $body = $body->getContents();
        }
        $data = json_decode($body, true);
        if ($data == false) {
            throw new RuntimeException("json_decode error : " . json_last_error_msg() . ". {$body}\n");
        }

        return $data;
    }
}

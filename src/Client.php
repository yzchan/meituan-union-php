<?php

namespace Meituan\Union;

use RuntimeException;
use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;

const GATEWAY = 'https://runion.meituan.com';

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
        return $this->sign($params) === $sign;
    }

    /**
     * 生成推广URL
     * @param array $params
     * @return array
     * @throws GuzzleException|RuntimeException
     */
    public function generateUrl(array $params): array
    {
        $url = GATEWAY . '/generateLink';
        $params = array_merge([
            'key' => $this->key,
        ], $params);
        return $this->_request($url, $params);
    }

    /**
     * @return Link
     */
    public function newLinkRequest(): Link
    {
        return new Link($this);
    }

    /**
     * 新订单列表查询
     * @param array $params
     * @return array
     * @throws GuzzleException|RuntimeException
     */
    function orderList(array $params): array
    {
        $url = GATEWAY . '/api/orderList';

        $params = array_merge([
            'key' => $this->key,
            'ts' => (string)time(),
        ], $params);
        return $this->_request($url, $params);
    }

    /**
     * @return Order
     */
    public function newOrderRequest(): Order
    {
        return new Order($this);
    }

    /**
     * 生成小程序二维码
     * @param array $params
     * @return array
     * @throws GuzzleException|RuntimeException
     */
    function miniCode(array $params): array
    {
        $url = GATEWAY . '/miniCode';
        $params = array_merge([
            'key' => $this->key,
        ], $params);
        return $this->_request($url, $params);
    }

    /**
     * @param string $url
     * @param array $params
     * @return array
     * @throws GuzzleException|RuntimeException
     */
    protected function _request(string $url, array $params): array
    {
        $params['sign'] = $this->sign($params);

        $client = new GuzzleClient(['http_errors' => false]);
        try {
            $response = $client->request('get', $url, [
                'query' => $params
            ]);
        } catch (GuzzleException $e) {
            throw $e;
        }

        $body = $response->getBody();
        if ($body instanceof Stream) {
            $body = $body->getContents();
        }
        $data = json_decode($body, true);
        if ($data === false) {
            throw new RuntimeException("Failed to decode json : " . json_last_error());
        }

        return $data;
    }
}

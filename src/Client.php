<?php

namespace MeituanUnion;

use RuntimeException;
use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use MeituanUnion\request\Request;
use MeituanUnion\request\SkuQueryRequest;
use MeituanUnion\request\OrderRequest;
use MeituanUnion\request\MiniCodeRequest;
use MeituanUnion\request\OrderListRequest;
use MeituanUnion\request\GenerateLinkRequest;
use MeituanUnion\request\GetQualityScoreBySidRequest;

const GATEWAY = 'https://openapi.meituan.com';

/**
 * Class Client
 * @package MeituanUnion
 *
 * magic method list
 * @method array order(array $params) 单订单查询接口
 * @method array orderList(array $params) 订单列表查询接口
 * @method array miniCode(array $params) 小程序生成二维码
 * @method array generateUrl(array $params) 自助取链
 * @method array skuQuery(array $params) 商品列表搜索接口
 * @method array getQualityScoreBySid(array $params) 优选sid质量分&复购率查询
 */
class Client
{
    private $key;
    private $secret; // 应用secret
    private $callbackSecret; // 回调secret

    /**
     * Client constructor.
     * @param string $key
     * @param string $secret
     * @param string $callbackSecret
     */
    public function __construct(string $key = "", string $secret = "", string $callbackSecret = "")
    {
        $this->key = $key;
        $this->secret = $secret;
        $this->callbackSecret = $callbackSecret;
    }

    /**
     * @param string $method
     * @param array $args
     * @return array
     * @throws GuzzleException|RuntimeException
     */
    function __call(string $method, array $args): array
    {
        $methods = [
            'order' => OrderRequest::apiPath(),
            'orderList' => OrderListRequest::apiPath(),
            'miniCode' => MiniCodeRequest::apiPath(),
            'generateUrl' => GenerateLinkRequest::apiPath(),
            'skuQuery' => SkuQueryRequest::apiPath(),
            'getQualityScoreBySid' => GetQualityScoreBySidRequest::apiPath(),
        ];
        if (in_array($method, array_keys($methods)) && count($args) == 1) {
            return $this->request($methods[$method], $args[0]);
        } else {
            $class = get_class($this);
            throw new RuntimeException("Call to undefined method $class::$method");
        }
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
        $request->beforeRequest();
        $response = $this->request($request::apiPath(), $request->asArray());
        $request->afterRequest();
        return $response;
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

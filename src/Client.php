<?php

namespace MeituanUnion;

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
     * 生成推广URL
     * @param array $params
     * @return array
     * @throws GuzzleException|RuntimeException
     */
    public function generateUrl(array $params): array
    {
        $url = GATEWAY . '/api/generateLink';
        return $this->_request($url, $params);
    }

    /**
     * 生成小程序二维码
     * @param array $params
     * @return array
     * @throws GuzzleException|RuntimeException
     */
    function miniCode(array $params): array
    {
        return $this->_request(GATEWAY . '/api/miniCode', $params);
    }

    /**
     * 链接查询请求对象，可以查询推广链接和小程序二维码
     * @return Link
     */
    public function newLinkRequest(): Link
    {
        return new Link($this);
    }

    /**
     * 单个订单查询（新）
     * @param array $params
     * @return array
     * @throws GuzzleException|RuntimeException
     */
    function order(array $params): array
    {
        return $this->_request(GATEWAY . '/api/order', $params);
    }

    /**
     * 新订单列表查询
     * @param array $params
     * @return array
     * @throws GuzzleException|RuntimeException
     */
    function orderList(array $params): array
    {
        $params['ts'] = time();
        return $this->_request(GATEWAY . '/api/orderList', $params);
    }

    /**
     * 订单查询对象，可以格式化参数查询订单列表
     * @return Order
     */
    public function newOrderRequest(): Order
    {
        return new Order($this);
    }

    /**
     * 商品列表搜索接口（暂时只支持优选业务）
     * @param array $params
     * @return array
     * @throws GuzzleException|RuntimeException
     */
    public function skuQuery(array $params): array
    {
        $params['ts'] = time();
        return $this->_request(GATEWAY . '/sku/query', $params);
    }

    /**
     * 优选sid质量分&复购率查询
     * @param array $params
     * @return array
     * @throws GuzzleException|RuntimeException
     */
    public function qualityScore(array $params): array
    {
        $params['ts'] = time();
        return $this->_request(GATEWAY . '/api/getqualityscorebysid', $params);
    }

    /**
     * @param string $url
     * @param array $params
     * @return array
     * @throws GuzzleException|RuntimeException
     */
    protected function _request(string $url, array $params): array
    {
        $params['appkey'] = $this->key;
        $params['sign'] = $this->sign($params);

        $client = new GuzzleClient(['http_errors' => false]);
        try {
            $response = $client->request('GET', $url, ['query' => $params]);
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

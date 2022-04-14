<?php

namespace MeituanUnion\request;

/**
 * 订单列表查询接口
 * Class OrderListRequest
 * @package MeituanUnion\request
 */
class OrderListRequest extends Request
{
    public static function apiPath(): string
    {
        return '/api/orderList';
    }

    public function asArray(): array
    {
        // 当actId或businessLine未设置时，从请求参数中去除
        $params = (array)$this;
        if ($params['actId'] == 0) {
            unset($params['actId']);
        }
        if ($params['businessLine'] == 0) {
            unset($params['businessLine']);
        }
        return $params;
    }

    use BusinessLineTrait;
    use ActIdTrait;
    use TimeDuringTrait;
    use Pagination2Trait;

    // 查询时间类型
    const QUERY_BY_PAYTIME = 1; // 按订单支付时间查询
    const QUERY_BY_MODTIME = 2; // 按订单发生修改时间查询
    public $queryTimeType = 1;  // 查询时间类型，非必填

    /**
     * 设置按订单支付时间查询
     * @return $this
     */
    public function setQueryByPaytime(): self
    {
        $this->queryTimeType = self::QUERY_BY_PAYTIME;
        return $this;
    }

    /**
     * 设置按订单发生修改时间查询
     * @return $this
     */
    public function setQueryByModtime(): self
    {
        $this->queryTimeType = self::QUERY_BY_MODTIME;
        return $this;
    }
}
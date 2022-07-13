<?php

namespace MeituanUnion\request;

use MeituanUnion\request\traits\ActIdTrait;
use MeituanUnion\request\traits\TimeDuringTrait;
use MeituanUnion\request\traits\Pagination2Trait;
use MeituanUnion\request\traits\BusinessLineTrait;

/**
 * 订单列表查询接口
 * Class OrderListRequest
 * @package MeituanUnion\request
 */
class OrderListRequest extends Request
{
    use BusinessLineTrait;
    use ActIdTrait;
    use TimeDuringTrait;
    use Pagination2Trait;

    public static function apiPath(): string
    {
        return '/api/orderList';
    }

    public function asArray(): array
    {
        // 当actId或businessLine未设置时，从请求参数中去除
        $params = get_object_vars($this);
        if ($params['actId'] == 0) {
            unset($params['actId']);
        }
        if ($params['businessLine'] == 0) {
            unset($params['businessLine']);
        }
        return $params;
    }

    /**
     * @var int 查询时间类型 目前只能按订单支付时间查询
     */
    public $queryTimeType = 1;
}

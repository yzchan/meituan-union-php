<?php

namespace MeituanUnion\request;

use MeituanUnion\BusinessLine;

/**
 * 单订单查询接口
 * Class OrderRequest
 * @package MeituanUnion\request
 */
class OrderRequest extends Request
{
    public static function apiPath(): string
    {
        return '/api/order';
    }

    use ActIdTrait;

    use BusinessLineTrait;

    public $orderId = '';   // 订单ID
    public $full = 0;       // 是否返回完整订单信息(即是否包含返佣、退款信息) 枚举值： 0-非全量查询  1-全量查询

    /**
     * @param string $orderId
     * @return $this
     */
    public function setOrderId(string $orderId = ''): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @param bool $full
     * @return $this
     */
    public function setFull(bool $full = true): self
    {
        $this->full = (int)$full;
        return $this;
    }
}
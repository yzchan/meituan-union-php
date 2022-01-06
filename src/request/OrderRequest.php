<?php

namespace MeituanUnion\request;

/**
 * 单订单查询接口
 * Class OrderRequest
 * @package MeituanUnion\request
 */
class OrderRequest extends Request
{
    const PATH = '/api/order';

    use ActIdTrait;

    public $businessLine = 2;   // 业务线
    public $orderId = '';       // 订单ID
    public $full = 0;           // 是否返回完整订单信息(即是否包含返佣、退款信息) 枚举值： 0-非全量查询  1-全量查询

    /**
     * @param int $businessLine
     * @return $this
     */
    public function setBusinessLine(int $businessLine): self
    {
        $this->businessLine = $businessLine;
        return $this;
    }

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
     * @param int $full
     * @return $this
     */
    public function setFull(int $full = 1): self
    {
        $this->full = $full;
        return $this;
    }
}
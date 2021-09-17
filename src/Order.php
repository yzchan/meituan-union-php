<?php

namespace MeituanUnion;

use RuntimeException;
use GuzzleHttp\Exception\GuzzleException;

class Order
{
    //  订单类型
    const GROUP_SALE = 0;  // 团购订单
    const HOTEL = 2;       // 酒店订单
    const TAKEOUT = 4;     // 外卖订单
    const PHONE = 5;       // 话费&团好货订单
    const FLASH_SALE = 6;  // 闪购订单
    const OPTIMIZATION = 8;// 优选订单

    // 订单状态
    const STATUS_PAID = 1;      // 已付款
    const STATUS_COMPLETE = 8;  // 已完成
    const STATUS_REFUND = 9;    // 已退款或风控

    // 查询时间类型
    const QUERY_BY_PAYTIME = 1; // 按订单支付时间查询
    const QUERY_BY_MODTIME = 2; // 按订单发生修改时间查询

    // 风控状态
    const RISK_NO = 0;
    const RISK_YES = 1;

    private $_client;

    public $type = self::TAKEOUT;   // 查询订单类型
    public $startTime = 0;          // 查询起始时间戳（10位），以下单时间为准
    public $endTime = 0;            // 查询截止时间戳（10位），以下单时间为准
    public $page = 1;               // 分页，起始值从1开始
    public $limit = 20;             // 每页显示数据条数，最大值100
    public $queryTimeType = self::QUERY_BY_PAYTIME;      // 查询时间类型，非必填

    public function __construct(Client $client)
    {
        $this->_client = $client;
    }

    /**
     * @param string $time
     * @return $this
     */
    public function setStartTime(string $time): Order
    {
        $this->startTime = strtotime($time);
        return $this;
    }

    /**
     * @param string $time
     * @return $this
     */
    public function setEndTime(string $time): Order
    {
        $this->endTime = strtotime($time);
        return $this;
    }

    /**
     * @param int $page
     * @return $this
     */
    public function setPage(int $page = 1): Order
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @param int $limit
     * @return $this
     */
    public function setLimit(int $limit): Order
    {
        if ($limit < 1) $limit = 1;
        if ($limit > 100) $limit = 100;
        $this->limit = $limit;
        return $this;
    }

    /**
     * 设置按订单支付时间查询
     * @return $this
     */
    public function setQueryByPaytime(): Order
    {
        $this->queryTimeType = self::QUERY_BY_PAYTIME;
        return $this;
    }

    /**
     * 设置按订单发生修改时间查询
     * @return $this
     */
    public function setQueryByModtime(): Order
    {
        $this->queryTimeType = self::QUERY_BY_MODTIME;
        return $this;
    }

    /**
     * 发送查询请求
     * @return array
     * @throws GuzzleException|RuntimeException
     */
    public function query(): array
    {
        return $this->_client->orderList([
            'startTime' => $this->startTime,
            'endTime' => $this->endTime,
            'queryTimeType' => $this->queryTimeType,
            'page' => $this->page,
            'limit' => $this->limit,
            'type' => $this->type,
        ]);
    }
}
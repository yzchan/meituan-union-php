<?php

namespace MeituanUnion;

use RuntimeException;
use GuzzleHttp\Exception\GuzzleException;

class Order
{
    // 业务线类型 BusinessLine
    const PINGTAI = 1;  // 平台
    const WAIMAI = 2;   // 外卖/闪购  子业务线：外卖=1  闪购=2
    const JIUDIAN = 3;  // 酒店
    const YOUXUAN = 4;  // 优选


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

    //public $type = 0;             // 查询订单类型
    public $actId = 0;              // 活动id，与businessLine二者至少择其一
    public $businessLine = 2;       // 业务线，与actId二者至少择其一
    public $startTime = 0;          // 查询起始时间戳（10位），以下单时间为准
    public $endTime = 0;            // 查询截止时间戳（10位），以下单时间为准
    public $page = 1;               // 分页，起始值从1开始
    public $limit = 20;             // 每页显示数据条数，最大值100
    public $queryTimeType = self::QUERY_BY_PAYTIME; // 查询时间类型，非必填

    // 单个订单查询参数
    public $orderId = '';           // 订单ID
    public $full = true;            // 是否返回完整订单信息

    public function __construct(Client $client)
    {
        $this->_client = $client;
    }

    /**
     * @param int $businessLine
     * @return $this
     */
    public function setBusinessLine(int $businessLine): Order
    {
        $this->businessLine = $businessLine;
        return $this;
    }

    /**
     * @param int $actId
     * @return $this
     */
    public function setActId(int $actId): Order
    {
        $this->actId = $actId;
        return $this;
    }

    /**
     * @param int $time
     * @return $this
     */
    public function setStartTime(int $time): Order
    {
        $this->startTime = $time;
        return $this;
    }

    /**
     * @param int $time
     * @return $this
     */
    public function setEndTime(int $time): Order
    {
        $this->endTime = $time;
        return $this;
    }

    /**
     * @param string $date
     * @return $this
     */
    public function setDate(string $date): Order
    {
        $this->startTime = strtotime($date);
        $this->endTime = strtotime($date) + 86400;
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
    public function list(): array
    {
        $params = [
            'startTime' => $this->startTime,
            'endTime' => $this->endTime,
            'queryTimeType' => $this->queryTimeType,
            'page' => $this->page,
            'limit' => $this->limit,
            'businessLine' => $this->businessLine,
            //'type' => $this->type,
        ];
        if ($this->actId != 0) {
            $params['actId'] = $this->actId;
        }

        return $this->_client->orderList($params);
    }

    /**
     * @param string $orderId
     * @return $this
     */
    public function setOrderId(string $orderId = ''): Order
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @param bool $full
     * @return $this
     */
    public function setFull(bool $full = true): Order
    {
        $this->full = $full;
        return $this;
    }

    public function info(): array
    {
        $params = [
            'orderId' => $this->orderId,
            'businessLine' => $this->businessLine,
            'full' => (int)$this->full
        ];
        if ($this->actId != 0) {
            $params['actId'] = $this->actId;
        }

        return $this->_client->order($params);
    }
}
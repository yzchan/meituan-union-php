<?php

namespace MeituanUnion\request;

/**
 * 订单列表查询接口
 * Class OrderListRequest
 * @package MeituanUnion\request
 */
class OrderListRequest extends Request
{
    const PATH = '/api/orderList';

    // 查询时间类型
    const QUERY_BY_PAYTIME = 1; // 按订单支付时间查询
    const QUERY_BY_MODTIME = 2; // 按订单发生修改时间查询

    public $actId = 0;          // 活动id，与businessLine二者至少择其一
    public $businessLine = 2;   // 业务线，与actId二者至少择其一
    public $startTime = 0;      // 查询起始时间戳（10位），以下单时间为准
    public $endTime = 0;        // 查询截止时间戳（10位），以下单时间为准
    public $page = 1;           // 分页，起始值从1开始
    public $limit = 20;         // 每页显示数据条数，最大值100
    public $queryTimeType = 1;  // 查询时间类型，非必填  1-按订单支付时间查询

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
     * @param int $actId
     * @return $this
     */
    public function setActId(int $actId): self
    {
        $this->actId = $actId;
        return $this;
    }

    /**
     * @param int $time
     * @return $this
     */
    public function setStartTime(int $time): self
    {
        $this->startTime = $time;
        return $this;
    }

    /**
     * @param int $time
     * @return $this
     */
    public function setEndTime(int $time): self
    {
        $this->endTime = $time;
        return $this;
    }

    /**
     * @param string $date
     * @return $this
     */
    public function setDate(string $date): self
    {
        $this->startTime = strtotime($date);
        $this->endTime = strtotime($date) + 86400;
        return $this;
    }

    /**
     * @param int $page
     * @return $this
     */
    public function setPage(int $page = 1): self
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @param int $limit
     * @return $this
     */
    public function setLimit(int $limit): self
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

//    /**
//     * 发送查询请求
//     * @return array
//     * @throws GuzzleException|RuntimeException
//     */
//    public function list(): array
//    {
//        $params = [
//            'startTime' => $this->startTime,
//            'endTime' => $this->endTime,
//            'queryTimeType' => $this->queryTimeType,
//            'page' => $this->page,
//            'limit' => $this->limit,
//            'businessLine' => $this->businessLine,
//            //'type' => $this->type,
//        ];
//        if ($this->actId != 0) {
//            $params['actId'] = $this->actId;
//        }
//
//        return $this->_client->orderList($params);
//    }
}
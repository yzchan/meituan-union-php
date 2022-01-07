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

    // 活动id，与businessLine二者至少择其一
    use ActIdTrait;

    // 业务线，与actId二者至少择其一
    use BusinessLineTrait;

    // 时间区间属性
    use TimeDuringTrait;

    public $page = 1;   // 分页，起始值从1开始
    public $limit = 20; // 每页显示数据条数，最大值100

    /**
     * @param int $pageNo
     * @return $this
     */
    public function setPageNo(int $pageNo = 1): self
    {
        $this->page = $pageNo;
        return $this;
    }

    /**
     * 同setPageNo
     * @param int $page
     * @return $this
     */
    public function setPage(int $page = 1): self
    {
        return $this->setPageNo($page);
    }

    /**
     * @param int $pageSize
     * @return $this
     */
    public function setPageSize(int $pageSize): self
    {
        $this->limit = $pageSize;
        return $this;
    }

    /**
     * 同setPageSize
     * @param int $limit
     * @return $this
     */
    public function setLimit(int $limit): self
    {
        return $this->setPageSize($limit);
    }

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
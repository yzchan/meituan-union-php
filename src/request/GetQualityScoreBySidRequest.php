<?php

namespace MeituanUnion\request;

/**
 * 优选sid质量分&复购率查询
 * Class GetQualityScoreBySidRequest
 * @package MeituanUnion\request
 */
class GetQualityScoreBySidRequest extends Request
{
    const PATH = '/api/getqualityscorebysid';

    use SidTrait;

    public $businessLine = 4;   // 业务线（默认为:4表示优选）
    public $type = 1;           // 质量分类型（1表示预估类型、2表示实际类型）
    public $pageSize = 20;      // 页大小，默认20，1~100
    public $pageNo = 1;         // 第几页，默认：１
    public $beginDate = '';     // 查询起始日期格式如：yyyy-mm-dd（注：起始时间应晚于三个月前）
    public $endDate = '';       // 查询截止日期格式如：yyyy-mm-dd（注：日期间隔最长为90天）

    /**
     * @param int $type
     * @return $this
     */
    public function setType(int $type): self
    {
        $this->type = $type;
        return $this;
    }

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
     * @param string $beginDate
     * @return $this
     */
    public function setBeginDate(string $beginDate): self
    {
        $this->beginDate = $beginDate;
        return $this;
    }

    /**
     * @param string $endDate
     * @return $this
     */
    public function setEndDate(string $endDate): self
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @param int $pageNo
     * @return $this
     */
    public function setPageNo(int $pageNo): self
    {
        $this->pageNo = $pageNo;
        return $this;
    }

    /**
     * @param int $pageSize
     * @return $this
     */
    public function setPageSize(int $pageSize): self
    {
        $this->pageSize = $pageSize;
        return $this;
    }
}
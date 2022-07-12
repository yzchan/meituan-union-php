<?php

namespace MeituanUnion\request\traits;

trait DateBetweenTrait
{
    /**
     * @var string 查询起始日期格式如：yyyy-mm-dd（注：起始时间应晚于三个月前）
     */
    public $beginDate = '';

    /**
     * @var string 查询截止日期格式如：yyyy-mm-dd（注：日期间隔最长为90天）
     */
    public $endDate = '';

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
     * @param string $beginDate
     * @param string $endDate
     * @return $this
     */
    public function setDateBetween(string $beginDate, string $endDate): self
    {
        $this->beginDate = $beginDate;
        $this->endDate   = $endDate;
        return $this;
    }
}

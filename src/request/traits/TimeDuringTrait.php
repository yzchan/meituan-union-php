<?php

namespace MeituanUnion\request\traits;

trait TimeDuringTrait
{
    /**
     * @var int 查询起始时间戳（10位），以下单时间为准
     */
    public $startTime = 0;

    /**
     * @var int 查询截止时间戳（10位），以下单时间为准
     */
    public $endTime = 0;

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
        $this->endTime   = strtotime($date) + 86400;
        return $this;
    }

    /**
     * @param int $startTime
     * @param int $endTime
     * @return $this
     */
    public function setTimeBetween(int $startTime, int $endTime): self
    {
        $this->startTime = $startTime;
        $this->endTime   = $endTime;
        return $this;
    }
}

<?php

namespace MeituanUnion\request;

trait BusinessLineTrait
{
    public $businessLine = 0;   // 业务线

    /**
     * @param int $businessLine
     * @return $this
     */
    public function setBusinessLine(int $businessLine): self
    {
        $this->businessLine = $businessLine;
        return $this;
    }
}
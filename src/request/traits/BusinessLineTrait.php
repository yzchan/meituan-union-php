<?php

namespace MeituanUnion\request\traits;

trait BusinessLineTrait
{
    /**
     * @var int 业务线
     */
    public $businessLine = 0;

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

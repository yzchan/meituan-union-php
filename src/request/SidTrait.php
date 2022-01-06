<?php

namespace MeituanUnion\request;

trait SidTrait
{
    public $sid = '';   // 推广位sid

    /**
     * @param string $sid
     * @return $this
     */
    public function setSid(string $sid): self
    {
        $this->sid = $sid;
        return $this;
    }
}
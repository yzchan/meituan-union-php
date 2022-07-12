<?php

namespace MeituanUnion\request\traits;

trait SidTrait
{
    /**
     * @var string 推广位sid
     */
    public $sid = '';

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

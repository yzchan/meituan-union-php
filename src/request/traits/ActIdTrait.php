<?php

namespace MeituanUnion\request\traits;

trait ActIdTrait
{
    public $actId = 0;  // 活动id

    /**
     * @param int $actId
     * @return $this
     */
    public function setActId(int $actId): self
    {
        $this->actId = $actId;
        return $this;
    }
}

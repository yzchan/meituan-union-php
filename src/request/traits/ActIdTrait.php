<?php

namespace MeituanUnion\request\traits;

trait ActIdTrait
{
    /**
     * @var int 活动id
     */
    public $actId = 0;

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

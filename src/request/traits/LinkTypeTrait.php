<?php

namespace MeituanUnion\request\traits;

trait LinkTypeTrait
{
    /**
     * @var int
     */
    public $linkType;    // 投放链接的类型

    /**
     * @param int $linkType
     * @return $this
     */
    public function setLinkType(int $linkType): self
    {
        $this->linkType = $linkType;
        return $this;
    }
}

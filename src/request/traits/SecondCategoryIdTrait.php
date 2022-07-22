<?php

namespace MeituanUnion\request\traits;

trait SecondCategoryIdTrait
{
    /**
     * @var int 二级品类ID
     * @see https://union.meituan.com/single/helpCenter?id=69
     */
    public $secondCategoryId = 0;

    /**
     * @param  int  $secondCategoryId
     * @return $this
     */
    public function setSecondCategoryId(int $secondCategoryId): self
    {
        $this->secondCategoryId = $secondCategoryId;
        return $this;
    }
}

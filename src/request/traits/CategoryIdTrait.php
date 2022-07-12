<?php

namespace MeituanUnion\request\traits;

trait CategoryIdTrait
{
    /**
     * @var int 2022年4月新增商品类目ID 目前仅优选业务线单品推广使用
     */
    public $categoryId = 0;

    /**
     * @param int $categoryId
     * @return $this
     */
    public function setCategoryId(int $categoryId): self
    {
        $this->categoryId = $categoryId;
        return $this;
    }
}

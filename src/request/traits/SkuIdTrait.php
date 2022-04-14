<?php

namespace MeituanUnion\request\traits;

trait SkuIdTrait
{
    public $skuId = 0;              // 2022年4月新增商品ID 目前仅优选业务线单品推广使用

    /**
     * @param int $skuId
     * @return $this
     */
    public function setSkuId(int $skuId): self
    {
        $this->skuId = $skuId;
        return $this;
    }
}
<?php

namespace MeituanUnion\request;

/**
 * 商品列表搜索接口
 * Class SkuQueryRequest
 * @package MeituanUnion\request
 */
class SkuQueryRequest extends Request
{
    public static function apiPath(): string
    {
        return '/sku/query';
    }

    use SidTrait;

    use GeoTrait;

    use DeviceTrait;

    public $businessType = 6;   // 优选的传6即可，必填
    public $pageSize = 20;      // 页大小，默认20，1~100
    public $pageNO = 1;         // 第几页，默认：１

    /**
     * @param int $businessType
     * @return $this
     */
    public function setBusinessType(int $businessType): self
    {
        $this->businessType = $businessType;
        return $this;
    }

    /**
     * @param int $pageSize
     * @return $this
     */
    public function setPageSize(int $pageSize): self
    {
        $this->pageSize = $pageSize;
        return $this;
    }

    /**
     * @param int $pageNo
     * @return $this
     */
    public function setPageNo(int $pageNo): self
    {
        $this->pageNO = $pageNo;
        return $this;
    }
}
<?php

namespace MeituanUnion\request;

use MeituanUnion\BusinessLine;
use MeituanUnion\request\traits\GeoTrait;
use MeituanUnion\request\traits\SidTrait;
use MeituanUnion\request\traits\ActIdTrait;
use MeituanUnion\request\traits\CityIdTrait;
use MeituanUnion\request\traits\CategoryIdTrait;
use MeituanUnion\request\traits\PaginationTrait;
use MeituanUnion\request\traits\BusinessLineTrait;
use MeituanUnion\request\traits\SecondCategoryIdTrait;

/**
 * 门店POI查询接口
 * Class SkuQueryRequest
 * @package MeituanUnion\request
 */
class PoiRequest extends Request
{
    use SidTrait;
    use GeoTrait;
    use PaginationTrait;
    use CategoryIdTrait;
    use BusinessLineTrait;
    use SecondCategoryIdTrait;

    public static function apiPath(): string
    {
        return '/api/mtunion/poi';
    }

    public function __construct()
    {
        // 固定2=外卖
        $this->setBusinessLine(BusinessLine::WAIMAI);
    }

    /**
     * @var string 筛选项列表，不筛选条件通过逗号分隔，筛选项目不超过6类
     * @see https://union.meituan.com/single/helpCenter?id=69
     */
    public $filterConditionCodes = '';

    /**
     * @param  string  $filterConditionCodes
     * @return $this
     */
    public function setFilterConditionCodes(string $filterConditionCodes): self
    {
        $this->filterConditionCodes = $filterConditionCodes;
        return $this;
    }

    /**
     * 首次查询不传，后面根据第一次接口返回的值传，否则可能导致翻页失败。
     * @var string
     */
    public $pageTraceId = '';

    /**
     * @param  string  $pageTraceId
     * @return $this
     */
    public function setPageTraceId(string $pageTraceId): self
    {
        $this->pageTraceId = $pageTraceId;
        return $this;
    }
}

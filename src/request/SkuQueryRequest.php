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
        return '/api/mtunion/sku';
    }

    use BusinessLineTrait;
    use ActIdTrait;
    use CityIdTrait;
    use CategoryIdTrait;
    use PaginationTrait;
}
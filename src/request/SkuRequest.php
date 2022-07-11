<?php

namespace MeituanUnion\request;

use MeituanUnion\request\traits\ActIdTrait;
use MeituanUnion\request\traits\CityIdTrait;
use MeituanUnion\request\traits\CategoryIdTrait;
use MeituanUnion\request\traits\PaginationTrait;
use MeituanUnion\request\traits\BusinessLineTrait;

/**
 * 商品列表搜索接口
 * Class SkuQueryRequest
 * @package MeituanUnion\request
 */
class SkuRequest extends Request
{
    use BusinessLineTrait;
    use ActIdTrait;
    use CityIdTrait;
    use CategoryIdTrait;
    use PaginationTrait;

    public static function apiPath(): string
    {
        return '/api/mtunion/sku';
    }
}

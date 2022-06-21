<?php

namespace MeituanUnion\request;

use MeituanUnion\request\traits\ActIdTrait;
use MeituanUnion\request\traits\BusinessLineTrait;
use MeituanUnion\request\traits\PaginationTrait;

/**
 * 商品类目查询
 * Class CategoryRequest
 * @package MeituanUnion\request
 */
class CategoryRequest extends Request
{
    use BusinessLineTrait;
    use ActIdTrait;
    use PaginationTrait;

    public static function apiPath(): string
    {
        return '/api/mtunion/category';
    }
}

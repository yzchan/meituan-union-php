<?php

namespace MeituanUnion\request;

/**
 * 商品类目查询
 * Class CategoryRequest
 * @package MeituanUnion\request
 */
class CategoryRequest extends Request
{
    public static function apiPath(): string
    {
        return '/api/mtunion/category';
    }

    use BusinessLineTrait;
    use ActIdTrait;
    use PaginationTrait;
}
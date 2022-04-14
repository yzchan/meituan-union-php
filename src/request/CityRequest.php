<?php

namespace MeituanUnion\request;

use MeituanUnion\request\traits\BusinessLineTrait;
use MeituanUnion\request\traits\PaginationTrait;

/**
 * 城市信息查询
 * Class CityRequest
 * @package MeituanUnion\request
 */
class CityRequest extends Request
{
    public static function apiPath(): string
    {
        return '/api/mtunion/city';
    }

    use BusinessLineTrait;
    use PaginationTrait;
}
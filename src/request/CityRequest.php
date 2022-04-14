<?php

namespace MeituanUnion\request;

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
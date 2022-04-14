<?php

namespace MeituanUnion\request;

use MeituanUnion\request\traits\ActIdTrait;
use MeituanUnion\request\traits\CategoryIdTrait;
use MeituanUnion\request\traits\CityIdTrait;
use MeituanUnion\request\traits\LinkTypeTrait;
use MeituanUnion\request\traits\SidTrait;
use MeituanUnion\request\traits\SkuIdTrait;

/**
 * 小程序生成二维码
 * Class MiniCodeRequest
 * @package MeituanUnion\request
 */
class MiniCodeRequest extends Request
{
    public static function apiPath(): string
    {
        return '/api/miniCode';
    }

    const WECHAT = 4;               // 微信小程序Path
    const YOUXUAN_WXAPP = 8;        // 微信小程序-优选小程序

    use SidTrait;
    use ActIdTrait;
    use LinkTypeTrait;
    use CityIdTrait;
    use SkuIdTrait;
    use CategoryIdTrait;
}
<?php

namespace MeituanUnion\request;

use MeituanUnion\request\traits\SidTrait;
use MeituanUnion\request\traits\ActIdTrait;
use MeituanUnion\request\traits\SkuIdTrait;
use MeituanUnion\request\traits\CityIdTrait;
use MeituanUnion\request\traits\LinkTypeTrait;
use MeituanUnion\request\traits\CategoryIdTrait;

/**
 * 小程序生成二维码
 * Class MiniCodeRequest
 * @package MeituanUnion\request
 */
class MiniCodeRequest extends Request
{
    use SidTrait;
    use ActIdTrait;
    use LinkTypeTrait;
    use CityIdTrait;
    use SkuIdTrait;
    use CategoryIdTrait;

    public static function apiPath(): string
    {
        return '/api/miniCode';
    }

    public const WECHAT = 4;               // 微信小程序Path

    public const YOUXUAN_WXAPP = 8;        // 微信小程序-优选小程序
}

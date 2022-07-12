<?php

namespace MeituanUnion\request;

use MeituanUnion\request\traits\SidTrait;
use MeituanUnion\request\traits\ActIdTrait;
use MeituanUnion\request\traits\SkuIdTrait;
use MeituanUnion\request\traits\CityIdTrait;
use MeituanUnion\request\traits\LinkTypeTrait;
use MeituanUnion\request\traits\CategoryIdTrait;

/**
 * 自助取链接口
 * Class GenerateLinkRequest
 * @package MeituanUnion\request
 */
class GenerateLinkRequest extends Request
{
    use SidTrait;
    use ActIdTrait;
    use LinkTypeTrait;
    use CityIdTrait;
    use SkuIdTrait;
    use CategoryIdTrait;

    public static function apiPath(): string
    {
        return '/api/generateLink';
    }

    // 链接类型
    public const H5 = 1;                   // H5类型的链接

    public const DEEPLINK = 2;             // DEEP类型的链接

    public const MID = 3;                  // 中间唤起页的链接

    public const WECHAT = 4;               // 微信小程序Path

    public const GROUP_WORD = 5;           // 团口令

    public const YOUXUAN_DEEPLINK = 6;     // Deeplink-优选APP

    public const YOUXUAN_MIDDLEPAGE = 7;   // 中间页唤起-优选APP

    public const YOUXUAN_WXAPP = 8;        // 微信小程序-优选小程序

    /**
     * @var bool 是否短链
     */
    public $shortLink = true;

    /**
     * @var int 门店信息-目前不起用
     */
    public $poiId = 0;

    /**
     * @param bool $isShortLink
     * @return $this
     */
    public function setShortLink(bool $isShortLink): self
    {
        $this->shortLink = $isShortLink;
        return $this;
    }
}

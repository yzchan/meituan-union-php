<?php

namespace MeituanUnion\request;

/**
 * 自助取链接口
 * Class GenerateLinkRequest
 * @package MeituanUnion\request
 */
class GenerateLinkRequest extends Request
{
    public static function apiPath(): string
    {
        return '/api/generateLink';
    }

    // 链接类型
    const H5 = 1;                   // H5类型的链接
    const DEEPLINK = 2;             // DEEP类型的链接
    const MID = 3;                  // 中间唤起页的链接
    const WECHAT = 4;               // 微信小程序Path
    const GROUP_WORD = 5;           // 团口令
    const YOUXUAN_DEEPLINK = 6;     // Deeplink-优选APP
    const YOUXUAN_MIDDLEPAGE = 7;   // 中间页唤起-优选APP
    const YOUXUAN_WXAPP = 8;        // 微信小程序-优选小程序

    use SidTrait;
    use ActIdTrait;
    use LinkTypeTrait;
    use CityIdTrait;
    use SkuIdTrait;
    use CategoryIdTrait;

    public $shortLink = true;       // 长链 or 短链
    public $poiId = 0;              // 门店信息-目前不起用

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
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
    const H5 = 1;      // H5类型的链接
    const DEEPLINK = 2;// DEEP类型的链接
    const CENTER = 3;  // 中间唤起页的链接
    const WECHAT = 4;  // 微信小程序Path
    const GROUP = 5;    // 团口令

    use SidTrait;
    use ActIdTrait;

    public $linkType = self::H5;    // 投放链接的类型
    public $shortLink = true;       // 长链 or 短链

    /**
     * @param int $linkType
     * @return $this
     */
    public function setLinkType(int $linkType): self
    {
        $this->linkType = $linkType;
        return $this;
    }

    /**
     * @param bool $isShortLink
     * @return $this
     */
    public function setShortLink(bool $isShortLink): self
    {
        $this->shortLink = $isShortLink;
        return $this;
    }

    /**
     * @return $this
     */
    public function setH5Link(): self
    {
        $this->linkType = self::H5;
        return $this;
    }

    /**
     * @return $this
     */
    public function setDeepLink(): self
    {
        $this->linkType = self::DEEPLINK;
        return $this;
    }

    /**
     * @return $this
     */
    public function setCenterLink(): self
    {
        $this->linkType = self::CENTER;
        return $this;
    }

    /**
     * @return $this
     */
    public function setWechatLink(): self
    {
        $this->linkType = self::WECHAT;
        return $this;
    }

    /**
     * @return $this
     */
    public function setGroupLink(): self
    {
        $this->linkType = self::GROUP;
        return $this;
    }
}
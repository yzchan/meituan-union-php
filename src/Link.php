<?php

namespace MeituanUnion;

use RuntimeException;
use GuzzleHttp\Exception\GuzzleException;

class Link
{
    // 链接类型
    const H5 = 1;      // H5类型的链接
    const DEEPLINK = 2;// DEEP类型的链接
    const CENTER = 3;  // 中间唤起页的链接
    const WECHAT = 4;  // 微信小程序Path

    private $_client;

    public $actId = 0;
    public $sid = '';
    public $linkType = self::H5;

    public function __construct(Client $client)
    {
        $this->_client = $client;
    }

    /**
     * @param string $sid
     * @return $this
     */
    public function setSid(string $sid): Link
    {
        $this->sid = $sid;
        return $this;
    }

    /**
     * @param int $actId
     * @return $this
     */
    public function setActId(int $actId): Link
    {
        $this->actId = $actId;
        return $this;
    }

    /**
     * @param int $linkType
     * @return $this
     */
    public function setLinkType(int $linkType): Link
    {
        $this->linkType = $linkType;
        return $this;
    }

    /**
     * @return $this
     */
    public function setH5Link(): Link
    {
        $this->linkType = self::H5;
        return $this;
    }

    /**
     * @return $this
     */
    public function setDeepLink(): Link
    {
        $this->linkType = self::DEEPLINK;
        return $this;
    }

    /**
     * @return $this
     */
    public function setCenterLink(): Link
    {
        $this->linkType = self::CENTER;
        return $this;
    }

    /**
     * @return $this
     */
    public function setWechatLink(): Link
    {
        $this->linkType = self::WECHAT;
        return $this;
    }

    /**
     * @return array
     * @throws GuzzleException|RuntimeException
     */
    public function generateUrl(): array
    {
        return $this->_client->generateUrl([
            'actId' => $this->actId,
            'sid' => $this->sid,
            'linkType' => $this->linkType,
        ]);
    }

    /**
     * @return array
     * @throws GuzzleException|RuntimeException
     */
    public function miniCode(): array
    {
        return $this->_client->miniCode([
            'actId' => $this->actId,
            'sid' => $this->sid,
            'linkType' => $this->linkType,
        ]);
    }
}
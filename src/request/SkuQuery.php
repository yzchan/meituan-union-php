<?php

namespace MeituanUnion\request;

/**
 * 商品列表搜索接口
 * Class SkuQuery
 * @package MeituanUnion\request
 */
class SkuQuery extends Request
{
    const PATH = '/sku/query';

    use SidTrait;

    public $businessType = 6;   // 优选的传6即可，必填
    public $pageSize = 20;      // 页大小，默认20，1~100
    public $pageNO = 1;         // 第几页，默认：１
    public $longitude = '';     // 本地化业务入参-LBS信息-经度
    public $latitude = '';      // 本地化业务入参-LBS信息-纬度
    public $deviceType = '';    // ios、android
    public $deviceId = '';      // iOS设备传明文IDFA Android设备版本10以上发MD5的OAID，版本10以下发MD5的IMEI号

    /**
     * @param int $businessType
     * @return $this
     */
    public function setBusinessType(int $businessType): self
    {
        $this->businessType = $businessType;
        return $this;
    }

    /**
     * @param int $pageSize
     * @return $this
     */
    public function setPageSize(int $pageSize): self
    {
        $this->pageSize = $pageSize;
        return $this;
    }

    /**
     * @param int $pageNO
     * @return $this
     */
    public function setPageNO(int $pageNO): self
    {
        $this->pageNO = $pageNO;
        return $this;
    }

    /**
     * @param string $latitude
     * @return $this
     */
    public function setLatitude(string $latitude): self
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @param string $longitude
     * @return $this
     */
    public function setLongitude(string $longitude): self
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @param string $deviceType
     * @return $this
     */
    public function setDeviceType(string $deviceType): self
    {
        $this->deviceType = $deviceType;
        return $this;
    }

    /**
     * @param string $deviceId
     * @return $this
     */
    public function setDeviceId(string $deviceId): self
    {
        $this->deviceId = $deviceId;
        return $this;
    }
}
<?php

namespace MeituanUnion\request;

trait DeviceTrait
{
    public $deviceType = '';    // ios、android
    public $deviceId = '';      // iOS设备传明文IDFA Android设备版本10以上发MD5的OAID，版本10以下发MD5的IMEI号

    /**
     * @param string $deviceType
     * @param string $deviceId
     * @return $this
     */
    public function setDevice(string $deviceType, string $deviceId): self
    {
        $this->deviceType = $deviceType;
        $this->deviceId = $deviceId;
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
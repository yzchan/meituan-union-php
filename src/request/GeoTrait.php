<?php

namespace MeituanUnion\request;

trait GeoTrait
{
    public $longitude = '';     // 本地化业务入参-LBS信息-经度
    public $latitude = '';      // 本地化业务入参-LBS信息-纬度

    /**
     * @param string $longitude
     * @param string $latitude
     * @return $this
     */
    public function setGeo(string $longitude, string $latitude): self
    {
        $this->longitude = $longitude;
        $this->latitude = $latitude;
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
}
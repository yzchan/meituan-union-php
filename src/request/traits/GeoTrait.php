<?php

namespace MeituanUnion\request\traits;

trait GeoTrait
{
    /**
     * @var int 火星坐标系，用户当前地理位置信息
     */
    public $longitude = 0;

    /**
     * @param  int  $longitude
     * @return $this
     */
    public function setLongitude(int $longitude): self
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @var int 火星坐标系，用户当前地理位置信息
     */
    public $latitude = 0;

    /**
     * @param  int  $latitude
     * @return $this
     */
    public function setLatitude(int $latitude): self
    {
        $this->latitude = $latitude;
        return $this;
    }
}

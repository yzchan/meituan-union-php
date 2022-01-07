<?php

namespace MeituanUnion\request;

use MeituanUnion\BusinessLine;

/**
 * 优选sid质量分&复购率查询
 * Class GetQualityScoreBySidRequest
 * @package MeituanUnion\request
 */
class GetQualityScoreBySidRequest extends Request
{
    public static function apiPath(): string
    {
        return '/api/getqualityscorebysid';
    }

    public function __construct()
    {
        $this->setBusinessLine(BusinessLine::YOUXUAN);
    }

    use SidTrait;
    use BusinessLineTrait;
    use DateBetweenTrait;

    public $type = 1;           // 质量分类型（1表示预估类型、2表示实际类型）

    /**
     * @param int $type
     * @return $this
     */
    public function setType(int $type): self
    {
        $this->type = $type;
        return $this;
    }

    public $pageSize = 20;      // 页大小，默认20，1~100
    public $pageNo = 1;         // 第几页，默认：１

    /**
     * @param int $pageNo
     * @return $this
     */
    public function setPageNo(int $pageNo): self
    {
        $this->pageNo = $pageNo;
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
}
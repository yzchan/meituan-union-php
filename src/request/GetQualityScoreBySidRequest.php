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
    use CityIdTrait;
    use CategoryIdTrait;
    use PaginationTrait;

    public $type = 1;           // 质量分类型（1表示预估类型、2表示实际类型）
    public $promotionType = 2;  // 订单质量分类型：CPS类订单=1；CPA类订单=2(默认)  2022年4月新增，优选CPA、S均提供质量分查询能力

    /**
     * @param int $type
     * @return $this
     */
    public function setType(int $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param int $promotionType
     * @return $this
     */
    public function setPromotionType(int $promotionType): self
    {
        $this->promotionType = $promotionType;
        return $this;
    }
}
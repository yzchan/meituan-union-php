<?php

namespace MeituanUnion\request;

use MeituanUnion\BusinessLine;
use MeituanUnion\request\traits\SidTrait;
use MeituanUnion\request\traits\CityIdTrait;
use MeituanUnion\request\traits\CategoryIdTrait;
use MeituanUnion\request\traits\PaginationTrait;
use MeituanUnion\request\traits\DateBetweenTrait;
use MeituanUnion\request\traits\BusinessLineTrait;

/**
 * 优选sid质量分&复购率查询
 * Class GetQualityScoreBySidRequest
 * @package MeituanUnion\request
 */
class GetQualityScoreBySidRequest extends Request
{
    use SidTrait;
    use BusinessLineTrait;
    use DateBetweenTrait;
    use CityIdTrait;
    use CategoryIdTrait;
    use PaginationTrait;

    public static function apiPath(): string
    {
        return '/api/getqualityscorebysid';
    }

    public function __construct()
    {
        $this->setBusinessLine(BusinessLine::YOUXUAN);
    }

    /**
     * @var int 质量分类型（1表示预估类型、2表示实际类型）
     */
    public $type = 1;

    /**
     * @var int 订单质量分类型：CPS类订单=1；CPA类订单=2(默认)  2022年4月新增，优选CPA、S均提供质量分查询能力
     */
    public $promotionType = 2;

    /**
     * 质量分类型（1表示预估类型、2表示实际类型）
     * 预估分：T+3生成；实际分：T+9生成
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

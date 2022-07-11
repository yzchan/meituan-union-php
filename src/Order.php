<?php

namespace MeituanUnion;

class Order
{
    // 订单状态
    public const STATUS_PAID = 1;      // 已付款

    public const STATUS_COMPLETE = 8;  // 已完成

    public const STATUS_REFUND = 9;    // 已退款或风控

    // 风控状态
    public const RISK_NO = 0;

    public const RISK_YES = 1;
}

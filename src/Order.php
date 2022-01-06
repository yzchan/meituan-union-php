<?php

namespace MeituanUnion;

class Order
{
    // 订单状态
    const STATUS_PAID = 1;      // 已付款
    const STATUS_COMPLETE = 8;  // 已完成
    const STATUS_REFUND = 9;    // 已退款或风控

    // 风控状态
    const RISK_NO = 0;
    const RISK_YES = 1;
}
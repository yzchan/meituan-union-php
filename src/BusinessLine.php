<?php

namespace MeituanUnion;

class BusinessLine
{
    // 业务线类型 BusinessLine
    const PINGTAI = 1;  // 平台
    const WAIMAI = 2;   // 外卖/闪购  子业务线：外卖=1  闪购=2
    const HOTEL = 3;    // 酒店
    const YOUXUAN = 4;  // 优选
    const DITUI = 5;    // 地推
    const DAOCAN = 9;   // 到餐

    // 当业务线类型=2时，存在如下子业务分类：
    const SUB_LINE_WAIMAI = 1;      // 外卖订单
    const SUB_LINE_SHANGOU = 2;     // 闪购订单
    const SUB_LINE_TUANHAOHUO = 3;  // 美团电商订单（团好货）
}
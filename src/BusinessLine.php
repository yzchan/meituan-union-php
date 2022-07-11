<?php

namespace MeituanUnion;

class BusinessLine
{
    // 业务线类型 BusinessLine
    public const PINGTAI = 1;  // 平台

    public const WAIMAI = 2;   // 外卖/闪购  子业务线：外卖=1  闪购=2

    public const HOTEL = 3;    // 酒店

    public const YOUXUAN = 4;  // 优选

    public const DITUI = 5;    // 地推

    public const DAOCAN = 9;   // 到餐（到店餐饮）

    public const DAOZONG = 10; // 到综（到店综合）

    // 当业务线类型=2时，存在如下子业务分类：
    public const SUB_LINE_WAIMAI = 1;      // 外卖订单

    public const SUB_LINE_SHANGOU = 2;     // 闪购订单

    public const SUB_LINE_DIANSHAGN = 3;   // 美团电商订单（团好货）
}

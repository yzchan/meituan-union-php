<?php

namespace MeituanUnion;

class BusinessLine
{
    // 业务线类型 BusinessLine
    const PINGTAI = 1;  // 平台
    const WAIMAI = 2;   // 外卖/闪购  子业务线：外卖=1  闪购=2
    const HOTEL = 3;    // 酒店
    const YOUXUAN = 4;  // 优选

    const SUB_LINE_WAIMAI = 1;
    const SUB_LINE_SHANGOU = 2;
}
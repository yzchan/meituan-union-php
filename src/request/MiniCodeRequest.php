<?php

namespace MeituanUnion\request;

/**
 * 小程序生成二维码
 * Class MiniCodeRequest
 * @package MeituanUnion\request
 */
class MiniCodeRequest extends Request
{
    const PATH = '/api/miniCode';

    use SidTrait;
    use ActIdTrait;
}
<?php

namespace MeituanUnion\request;

abstract class Request
{
    abstract public static function apiPath(): string;

    public function asArray(): array
    {
        return (array)$this;
    }

    public function beforeRequest()
    {
    }

    public function afterRequest()
    {
    }
}

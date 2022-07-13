<?php

namespace MeituanUnion\request;

abstract class Request
{
    abstract public static function apiPath(): string;

    public function asArray(): array
    {
        return get_object_vars($this);
    }

    public function beforeRequest(): void
    {
    }

    public function afterRequest(): void
    {
    }
}

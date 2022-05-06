<?php

namespace Starcoin;

use function PHPUnit\Framework\stringStartsWith;

class Tool
{
    public static function isWebsocket($address): bool
    {
        return preg_match("/^wss:\/\//", $address) || preg_match("/^ws:\/\//", $address);
    }

    public static function isHttp($address): bool
    {
        return preg_match("/^http:\/\//", $address) || preg_match("/^https:\/\//", $address);
    }


    public static function isIpc($address): bool
    {
        return preg_match("/^http:\/\//", $address) || preg_match("/^https:\/\//", $address);
    }

}
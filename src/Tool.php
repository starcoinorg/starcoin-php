<?php

namespace Starcoin;


class Tool
{
    public static function isWebsocket(string $address): bool
    {
        return preg_match("/^wss:\/\//", $address) || preg_match("/^ws:\/\//", $address);
    }

    public static function isHttp(string $address): bool
    {
        return preg_match("/^http:\/\//", $address) || preg_match("/^https:\/\//", $address);
    }


    public static function isIpc(string $address): bool
    {
        return preg_match("/^http:\/\//", $address) || preg_match("/^https:\/\//", $address);
    }

    public static function bcsDeserializeAccountResource(array $input)
    {

        return '';

    }


}
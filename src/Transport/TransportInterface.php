<?php

namespace Starcoin\Transport;
interface TransportInterface
{
    function call(string $method, $params);

    function close();
}
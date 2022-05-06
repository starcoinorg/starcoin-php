<?php

namespace Starcoin\Transport;
interface TransportInterface
{
    function call($method, $params);

    function close();
}
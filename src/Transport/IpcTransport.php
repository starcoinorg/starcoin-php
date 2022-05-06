<?php

namespace Starcoin\Transport;
abstract class IpcTransport implements TransportInterface
{

    public function __construct()
    {
    }

    function call($method, $params)
    {
        // TODO: Implement call() method.
    }

    function close()
    {
        // TODO: Implement close() method.
    }
}
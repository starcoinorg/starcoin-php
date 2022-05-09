<?php

namespace Starcoin;

use Starcoin\Transport\Transport;

class JsonRpc
{
    private Transport $rpc;

    public function __construct(string $address)
    {
        $this->rpc = new Transport($address);
    }

    public function call(string $method, $params = [])
    {
        return $this->rpc->call($method, $params);
    }
}
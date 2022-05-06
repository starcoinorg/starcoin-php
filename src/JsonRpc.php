<?php

namespace Starcoin;

use Starcoin\Transport\Transport;

class JsonRpc
{
    private $rpc;

    public function __construct($address)
    {
        $this->$address = $address;

        $this->rpc = new Transport($address);
    }

    public function call($method, $params = [])
    {
        return $this->rpc->call($method, $params);
    }
}
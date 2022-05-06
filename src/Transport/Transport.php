<?php

namespace Starcoin\Transport;
class Transport implements TransportInterface
{

    private $transport;

    public function __construct($address)
    {
        $this->transport = new HttpTransport($address);
    }


    function call($method, $params)
    {
        return $this->transport->call($method, $params);
    }

    function close()
    {
        $this->transport->close();
    }
}
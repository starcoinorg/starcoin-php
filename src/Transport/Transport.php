<?php

namespace Starcoin\Transport;

use Starcoin\Tool;

class Transport implements TransportInterface
{

    private $transport;

    public function __construct($address)
    {

        if (Tool::isWebsocket($address)) {
            $this->transport = new WsTransport($address);
        } elseif (Tool::isHttp($address)) {
            $this->transport = new HttpTransport($address);
        } elseif (Tool::isIpc($address)) {
            // TODO
            $this->transport = new IpcTransport($address);
        }

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
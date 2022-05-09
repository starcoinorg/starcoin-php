<?php

namespace Starcoin\Transport;

use Starcoin\Tool;
use Starcoin\type\ParamInterface;

class Transport implements TransportInterface
{

    private TransportInterface $transport;

    public function __construct(string $address)
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


    function call(string $method, $params)
    {
        if ($params instanceof ParamInterface) {
            $params = $params->toArray();
        }
        return $this->transport->call($method, $params);
    }

    function close()
    {
        $this->transport->close();
    }
}
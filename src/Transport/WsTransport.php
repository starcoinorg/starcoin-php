<?php

namespace Starcoin\Transport;
class WsTransport implements TransportInterface
{

    private $client;
    private $requestId = 0;


    public function __construct($address)
    {
        $this->client = new \WebSocket\Client($address);
    }

    function call(string $method, $params)
    {
        $query = [
            "id" => $this->requestId++,
            "jsonrpc" => "2.0",
            "method" => $method,
            "params" => $params
        ];

        $this->client->text(json_encode($query));

        $resp = $this->client->receive();
        return json_decode($resp, true);
    }

    function close()
    {
        $this->client->close();
    }
}
<?php

namespace Starcoin\Transport;
class HttpTransport implements TransportInterface
{

    private $client;
    private $address;

    public function __construct($address)
    {
        $this->client = new \GuzzleHttp\Client();
        $this->address = $address;
    }

    function call($method, $params)
    {
        $query = [
            "id" => "",
            "jsonrpc" => "2.0",
            "method" => $method,
            "params" => $params
        ];


        $r = $this->client->request('POST', $this->address, [
            'json' => $query
        ]);


        return json_decode($r->getBody()->getContents(), true);
    }

    function close()
    {
        // TODO: Implement close() method.
    }
}
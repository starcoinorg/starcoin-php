<?php

namespace Starcoin\Transport;

use Starcoin\Exception\JsonRpcException;

class HttpTransport implements TransportInterface
{

    private \GuzzleHttp\Client $client;
    private string $address;

    public function __construct(string $address)
    {
        $this->client = new \GuzzleHttp\Client();
        $this->address = $address;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws JsonRpcException
     */
    function call(string $method, $params)
    {
        $query = [
            "id" => 1,
            "jsonrpc" => "2.0",
            "method" => $method,
            "params" => $params
        ];


        $r = $this->client->request('POST', $this->address, [
            'json' => $query
        ]);


        $array = json_decode($r->getBody()->getContents(), true);
        if ($array && isset($array["error"])) {
            throw new JsonRpcException($array["error"]['message'], $array["error"]['code']);
        }

        return $array["result"];
    }

    function close()
    {
        // TODO: Implement close() method.
    }
}
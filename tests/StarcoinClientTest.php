<?php

namespace Starcoin\Tests;

use Starcoin;
use Starcoin\StarcoinClient;

class StarcoinClientTest extends \PHPUnit\Framework\TestCase
{

    private $client;

    public function init()
    {
        $this->client = new StarcoinClient("https://main-seed.starcoin.org/");
    }

    public function testConstructor()
    {
        $starcoin = new StarcoinClient("https://main-seed.starcoin.org/");
    }

    public function testListResource()
    {
        $this->init();
        $rs = $this->client->listResource("0x22a19240709CB17ec9523252AA17B997");
    }

    public function testGetBalanceOfStc(){
        $this->init();
        $rs = $this->client->getBalanceOfStc("0x22a19240709CB17ec9523252AA17B997");
    }

}
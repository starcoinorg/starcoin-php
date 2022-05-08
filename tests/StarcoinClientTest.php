<?php

namespace Starcoin\Tests;

use Starcoin;
use Starcoin\StarcoinClient;

class StarcoinClientTest extends \PHPUnit\Framework\TestCase
{

    private StarcoinClient $client;

    public  function setUp():void
    {
        $this->client = new StarcoinClient("https://main-seed.starcoin.org/");
    }


    public function test_constructor()
    {
        $rs = new StarcoinClient("https://main-seed.starcoin.org/");
        self::assertIsObject($rs);
    }

    public function test_constructorWs(){
        $rs = new StarcoinClient("ws://main.seed.starcoin.org:9870");
        self::assertIsObject($rs);
    }

    public function test_listResource()
    {
        $rs = $this->client->listResource("0x22a19240709CB17ec9523252AA17B997");
        $this->assertIsArray($rs);
    }

    public function test_getBalanceOfStc(){
        $rs = $this->client->getBalanceOfStc("0x22a19240709CB17ec9523252AA17B997");
    }

    public function test_getNodeInfo()
    {
        $rs = $this->client->getNodeInfo();
        $this->assertIsArray($rs);
    }

    public function test_getEvents()
    {
        $ev = new Starcoin\type\EventFilter();
        $ev->addrs = ["0x22a19240709CB17ec9523252AA17B997"];
        $ev->from_block = 2;
        $ev->to_block = 10;
        $rs = $this->client->getEvents($ev);
        $this->assertIsArray($rs);
    }

    public function test_getTransactionProof()
    {
        $blockHash = "0x37e8dd4f432a1c3a7b6dfcaa90ebf2aafa0287678ffe4b8ad2373c5b48ffb20c";
	    $txGlobalIdx  = 231188;
	    $eventIndex  = 1;
        $rs = $this->client->getTransactionProof($blockHash, $txGlobalIdx, $eventIndex);
        $this->assertNull($rs);
    }

    public function test_getTransactionByHash()
    {
        $transactionHash = "0xaaed473d705f7e727c8b7db2c331098731e2c3d601fe2296a8aea9b037420e81";

        $rs = $this->client->getTransactionByHash($transactionHash);

        $this->assertIsArray($rs);
    }

    public function test_getPendingTransactionByHash()
    {
        $transactionHash = "0xaaed473d705f7e727c8b7db2c331098731e2c3d601fe2296a8aea9b037420e81";

        $rs = $this->client->getPendingTransactionByHash($transactionHash);

        $this->assertNull($rs);
    }


    public function test_getTransactionInfoByHash()
    {
        $transactionHash = "0xaaed473d705f7e727c8b7db2c331098731e2c3d601fe2296a8aea9b037420e81";
        $rs = $this->client->getTransactionInfoByHash($transactionHash);
        $this->assertIsArray($rs);
    }

    public function test_getTransactionEventByHash()
    {
        $transactionHash = "0xaaed473d705f7e727c8b7db2c331098731e2c3d601fe2296a8aea9b037420e81";
        $rs = $this->client->getTransactionEventByHash($transactionHash);
        $this->assertIsArray($rs);

    }

    public function test_getBlockByHash()
    {
        $blockHash = "0x420de898aa5900fe656a51273e3c8cf8cb9c3700903f9ff3198d048a77edb22f";
        $rs = $this->client->getBlockByHash($blockHash);
        $this->assertIsArray($rs);
    }


    public function test_getBlockByNumber()
    {
        $number = 5616845;
        $rs = $this->client->getBlockByNumber($number);
        $this->assertIsArray($rs);

    }


    public function test_getBlockInfoByNumber()
    {
        $number = 5616845;
        $rs = $this->client->getBlockInfoByNumber($number);
        $this->assertIsArray($rs);
    }

    public function test_getBlockHeaderAndBlockInfoByNumber()
    {
        $number = 5616845;
        $rs = $this->client->getBlockHeaderAndBlockInfoByNumber($number);
        $this->assertIsArray($rs);
    }

    public function test_headerWithDifficultyInfoByNumber()
    {
        $number = 5616845;
        $rs = $this->client->headerWithDifficultyInfoByNumber($number);
        $this->assertIsArray($rs);
    }

    public function test_headerByNumber()
    {
        $number = 5616845;
        $rs = $this->client->headerByNumber($number);
        $this->assertIsArray($rs);
    }

    public function test_getBlocksFromNumber()
    {
        $number = 2;
        $rs = $this->client->getBlocksFromNumber($number,10);
        $this->assertIsArray($rs);
    }



    public function test_getEpochResourceByHeight()
    {
        $rs = $this->client->getEpochResourceByHeight(1);
        $this->assertIsArray($rs);
    }

    public function test_getEpochResource()
    {
        $stateRoot = "0x7244a297682da309e05bdd30a71876414cab8d499f5a904817bcd823307ad560";
        $rs = $this->client->getEpochResource($stateRoot);
        $this->assertIsArray($rs);
    }


    public function test_getResource()
    {
        $stateRoot = "0x7244a297682da309e05bdd30a71876414cab8d499f5a904817bcd823307ad560";
        $addr = "0x00000000000000000000000000000001";
        $restype = "0x1::Epoch::Epoch";
        $opt = [
            "decode"=>true,
            "state_root" => $stateRoot
        ];
        $rs = $this->client->getResource($addr,$restype,$opt);
        $this->assertIsArray($rs);
    }

    public function test_getAccountSequenceNumber()
    {
        $address = "0x22a19240709CB17ec9523252AA17B997";
        $rs = $this->client->getAccountSequenceNumber($address);
        $this->assertIsArray($rs);

    }

    public function test_getState()
    {
        $address = "0x22a19240709CB17ec9523252AA17B997";
        $rs = $this->client->getState($address);
        $this->assertIsArray($rs);

    }

    public function test_Subscribe()
    {

    }

    public function test_NewTxnSendRecvEventNotifications()
    {

    }

    public function test_NewPendingTransactionsNotifications()
    {

    }

    public function test_SubmitTransaction()
    {

    }


    public function test_SubmitSignedTransaction()
    {

    }

    public function test_SubmitSignedTransactionBytes()
    {

    }

    public function test_TransferStc()
    {
        $this->client->transferStc();

    }


    public function test_BuildTransferStcTxn()
    {

    }

    public function test_BuildRawUserTransaction()
    {

    }

    public function test_getGasUnitPrice()
    {
       $rs = $this->client->getGasUnitPrice();
       $this->assertIsInt($rs);
    }

    public function test_callContract($call)
    {
        return $this->rpc->call("contract.call_v2",$call);
    }

    public function test_EstimateGasByDryRunRaw()
    {

    }

    public function test_DryRunRaw()
    {

    }

    public function test_EstimateGas()
    {

    }

    public function test_DryRun()
    {

    }

    public function test_DeployContract()
    {

    }

}
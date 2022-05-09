<?php

namespace Starcoin;

use Starcoin\type\EventFilter;

class StarcoinClient
{


    private JsonRpc $rpc;

    public function __construct(string $rpcUrl)
    {

        $this->rpc = new JsonRpc($rpcUrl);
    }

    public function getNodeInfo()
    {
        return $this->rpc->call("node.info");
    }

    public function getEvents(EventFilter $eventFilter)
    {
        return $this->rpc->call("chain.get_events", $eventFilter);
    }

    public function getTransactionProof(string $blockHash, int $txGlobalIndex, int $eventIndex)
    {
        return $this->rpc->call("chain.get_transaction_proof", [$blockHash, $txGlobalIndex, $eventIndex]);
    }

    public function getTransactionByHash(string $transactionHash)
    {
        return $this->rpc->call("chain.get_transaction", [$transactionHash]);
    }

    public function getPendingTransactionByHash(string $transactionHash)
    {
        return $this->rpc->call("txpool.pending_txn", [$transactionHash]);
    }


    public function getTransactionInfoByHash(string $transactionHash)
    {
        return $this->rpc->call("chain.get_transaction_info", [$transactionHash]);
    }

    public function getTransactionEventByHash(string $transactionHash)
    {
        return $this->rpc->call("chain.get_events_by_txn_hash", [$transactionHash]);

    }

    public function getBlockByHash(string $blockHash)
    {
        return $this->rpc->call("chain.get_block_by_hash", [$blockHash]);
    }


    public function getBlockByNumber(int $number)
    {
        return $this->rpc->call("chain.get_block_by_number", [$number]);

    }


    public function getBlockInfoByNumber(int $number)
    {
        return $this->rpc->call("chain.get_block_info_by_number", [$number]);

    }

    public function getBlockHeaderAndBlockInfoByNumber(int $number)
    {
        // TODO
        return $this->rpc->call("chain.get_block_info_by_number", [$number]);
    }

    public function headerWithDifficultyInfoByNumber(int $number): array
    {

        $h = $this->headerByNumber($number);
        $parent = $this->getBlockByHash($h['parent_hash']);
        $stateroot = $parent['header']['state_root'];
        $epoch = $this->getEpochResource($stateroot);
        $blockInfo = $this->getBlockInfoByNumber($number);
        return ["header" => $h,
            'block_time_target' => $epoch['json']['block_time_target'],
            "block_difficulty_window" => $epoch['json']['block_difficulty_window'],
            "block_info" => $blockInfo];
    }

    public function headerByNumber(int $number)
    {
        return $this->rpc->call("chain.get_block_by_number", [$number])['header'];
    }

    public function getBlocksFromNumber(int $number, int $count = 10)
    {
        return $this->rpc->call("chain.get_blocks_by_number", [$number, $count]);
    }

    public function getBalanceOfStc(string $address)
    {
        $res = $this->listResource($address);

        $stcRaw = $res['resources']["0x00000000000000000000000000000001::Account::Balance<0x00000000000000000000000000000001::STC::STC>"];


    }


    public function listResource(string $address)
    {
        return $this->rpc->call("state.list_resource", [$address]);
    }

    public function getEpochResourceByHeight(int $height)
    {
        $h = $this->headerByNumber($height);
        return $this->getEpochResource($h['state_root']);
    }

    public function getEpochResource(string $stateroot)
    {
        $addr = "0x00000000000000000000000000000001";
        $restype = "0x1::Epoch::Epoch";
        $opt = [
            "decode" => true,
            "state_root" => $stateroot
        ];

        return $this->getResource($addr, $restype, $opt);

    }

    public function getResource(string $address, string $resType, $opt)
    {
        return $this->rpc->call("state.get_resource", [$address, $resType, $opt]);
    }

    // TODO
    public function getAccountSequenceNumber(string $address)
    {

        $state = $this->getState($address);
    }

    public function getState(string $address)
    {
        $result = $this->rpc->call("state.get", [$address . "/1/0x00000000000000000000000000000001::Account::Account"]);

        // TODO bcs
        return Tool::bcsDeserializeAccountResource($result);
    }

    public function Subscribe()
    {

    }

    public function NewTxnSendRecvEventNotifications()
    {

    }

    public function NewPendingTransactionsNotifications()
    {

    }

    public function SubmitTransaction()
    {

    }


    public function SubmitSignedTransaction()
    {

    }

    public function SubmitSignedTransactionBytes()
    {

    }

    public function transferStc()
    {

    }


    public function BuildTransferStcTxn()
    {

    }

    public function BuildRawUserTransaction()
    {

    }

    public function getGasUnitPrice(): int
    {
        return $this->rpc->call("txpool.gas_price") * 1;
    }

    public function callContract($call)
    {
        return $this->rpc->call("contract.call_v2", $call);
    }

    public function EstimateGasByDryRunRaw()
    {

    }

    public function DryRunRaw()
    {

    }

    public function EstimateGas()
    {

    }

    public function DryRun()
    {

    }

    public function DeployContract()
    {

    }

}
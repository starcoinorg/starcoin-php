<?php

namespace Starcoin;

class StarcoinClient
{


    private $rpc;

    public function __construct($rpcUrl)
    {
        $this->rpc = new JsonRpc($rpcUrl);
    }

    public function getNodeInfo()
    {
        return $this->rpc->call("node.info");
    }

    public function getEvents()
    {
        return $this->rpc->call("chain.get_events");
    }

    public function getTransactionProof($blockHash, $txGlobalIndex, $eventIndex)
    {
        return $this->rpc->call("chain.get_events", [$blockHash, $txGlobalIndex, $eventIndex]);
    }

    public function getTransactionByHash($transactionHash)
    {
        return $this->rpc->call("chain.get_transaction_proof", [$transactionHash]);
    }

    public function getPendingTransactionByHash($transactionHash)
    {
        return $this->rpc->call("txpool.pending_txn", [$transactionHash]);
    }


    public function getTransactionInfoByHash($transactionHash)
    {
        return $this->rpc->call("chain.get_transaction_info", [$transactionHash]);
    }

    public function getTransactionEventByHash($transactionHash)
    {
        return $this->rpc->call("chain.get_events_by_txn_hash", [$transactionHash]);

    }

    public function getBlockByHash($blockHash)
    {
        return $this->rpc->call("chain.get_block_by_hash", [$blockHash]);
    }


    public function getBlockByNumber($number)
    {
        return $this->rpc->call("chain.get_block_by_number", [$number]);

    }


    public function getBlockInfoByNumber($number)
    {
        return $this->rpc->call("chain.get_block_info_by_number", [$number]);

    }

    public function getBlockHeaderAndBlockInfoByNumber($number)
    {
        // TODO
        return $this->rpc->call("chain.get_block_info_by_number", [$number]);
    }

    public function HeaderWithDifficultyInfoByNumber()
    {

    }

    public function HeaderByNumber()
    {

    }

    public function getBlocksFromNumber()
    {

    }

    public function getBalanceOfStc(string $address)
    {
        $res = $this->listResource($address);
    }


    public function listResource(string $address)
    {
        return $this->rpc->call("state.list_resource", [$address]);
    }

    public function getEpochResourceByHeight()
    {

    }

    public function getEpochResource()
    {

    }

    public function getResource()
    {

    }

    public function getAccountSequenceNumber()
    {

    }

    public function getState(string $address)
    {
       $result = $this->rpc->call("state.get",$address."/1/0x00000000000000000000000000000001::Account::Account");

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

    public function TransferStc()
    {

    }


    public function BuildTransferStcTxn()
    {

    }

    public function BuildRawUserTransaction()
    {

    }

    public function getGasUnitPrice()
    {
       return $this->rpc->call("txpool.gas_price");
    }

    public function callContract($call)
    {
        return $this->rpc->call("contract.call_v2",$call);
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
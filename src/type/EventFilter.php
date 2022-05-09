<?php


namespace Starcoin\type;


class EventFilter implements ParamInterface
{
    use ToArray;

    public array $addrs;
    public array $type_tags;
    public int $from_block;
    public int $to_block;
    public array $event_keys;

}
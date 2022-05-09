<?php

namespace Starcoin\type;

trait ToArray
{
    public function toArray(): array
    {
        return [json_decode(json_encode($this), true)];
    }
}
<?php

namespace App\CQRS\Commands;

class CreateOrderCommand
{
    public $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }
}

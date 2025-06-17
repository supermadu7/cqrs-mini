<?php

namespace App\CQRS\Handlers;

use App\CQRS\Commands\CreateOrderCommand;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CreateOrderHandler
{
    public function handle(CreateOrderCommand $cmd)
    {
        return DB::transaction(function () use ($cmd) {
            $order = Order::create();
            foreach ($cmd->items as $item) {
                $product = Product::findOrFail($item['product_id']);
                if ($product->quantity < $item['quantity']) {
                    throw new \Exception('Insufficient stock');
                }
                $product->decrement('quantity', $item['quantity']);
                $order->items()->create(
                    ['product_id' => $item['product_id'], 'quantity' => $item['quantity']]
                );
            }
            return $order;
        });
    }
}

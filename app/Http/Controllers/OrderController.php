<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CQRS\Commands\CreateOrderCommand;
use App\CQRS\Handlers\CreateOrderHandler;

class OrderController extends Controller
{
    public function store(Request $request, CreateOrderHandler $handler)
    {
        $command = new CreateOrderCommand($request->input('items'));
        $order = $handler->handle($command);
        return response()->json($order);
    }
}

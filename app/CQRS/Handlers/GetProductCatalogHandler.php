<?php

namespace App\CQRS\Handlers;

use App\CQRS\Queries\GetProductCatalogQuery;
use App\Models\Product;

class GetProductCatalogHandler
{
    public function handle(GetProductCatalogQuery $query)
    {
        return Product::all()->map(function($p) {
            return [
                'id'       => $p->id,
                'name'     => $p->name,
                'price'    => $p->price,
                'quantity' => $p->quantity,
            ];
        });
    }
}

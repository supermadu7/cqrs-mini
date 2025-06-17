<?php

namespace App\Http\Controllers;

use App\CQRS\Queries\GetProductCatalogQuery;
use App\CQRS\Handlers\GetProductCatalogHandler;

class CatalogController extends Controller
{
    public function index(GetProductCatalogHandler $handler)
    {
        $products = $handler->handle(new GetProductCatalogQuery());
        return response()->json($products);
    }
}

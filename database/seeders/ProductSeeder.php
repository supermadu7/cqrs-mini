<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create(['name'=>'Widget A','price'=>9.99, 'quantity'=>100]);
        Product::create(['name'=>'Widget B','price'=>14.99,'quantity'=>50]);
        Product::create(['name'=>'Widget C','price'=>19.99,'quantity'=>75]);
        Product::create(['name'=>'Widget D','price'=>29.99,'quantity'=>30]);
        Product::create(['name'=>'Widget E','price'=>49.99,'quantity'=>20]);
    }
}


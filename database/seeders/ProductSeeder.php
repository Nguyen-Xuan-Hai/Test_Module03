<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->name = 'Ca phe sua';
        $product->description = 'ca phe chat luon cao';
        $product->price = '50000';
        $product->img = '12321234123';
        $product->category_id = 1;
        $product->save();

        $product = new Product();
        $product->name = 'Ca phe kem';
        $product->description = 'ca phe chat luon cao';
        $product->price = '100000';
        $product->img = 'df1231sdf';
        $product->category_id = 3;
        $product->save();

    }
}

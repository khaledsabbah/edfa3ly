<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            'T-shirt' => "10.99",
            "Pants" => "14.99",
            "Jacket" => "19.99",
            "Shoes" => "24.99",
        ];
        foreach ($products as $productName=>$price){
            Product::create([
                'name'=>$productName,
                'price'=>$price,
            ]);
        }
    }
}

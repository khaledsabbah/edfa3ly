<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Seeder;

class OffersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offers=[
            ['product_id'=>4,'amount'=>1,'related_product_id'=>4,'discount'=>'10'],
            ['product_id'=>1,'amount'=>'2','related_product_id'=>3,'discount'=>'50'],
        ];
        foreach ($offers as $offer){
            Offer::create($offer);
        }
    }
}

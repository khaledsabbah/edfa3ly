<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            [
                "symbol" => "$",
                "name" => "US Dollar",
                "rate" => 1,
                "code" => "USD",
            ],
            [
                "symbol" => "EGP",
                "name" => "Egyptian Pound",
                "rate" => 15.60,
                "code" => "EGP",
            ],
            [
                "symbol" => "€",
                "name" => "Euro",
                "code" => "EUR",
                "rate" => 0.84
            ],
            [
                "symbol" => "AED",
                "name" => "United Arab Emirates Dirham",
                "code" => "AED",
                "rate" => 3.67
            ]
        ];
        foreach ($currencies as $currency){
            Currency::create($currency);
        }
    }
}

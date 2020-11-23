<?php


namespace App\Contracts;


interface ICurrencyConverter
{
    public static function convert(IHoldCurrency $holdCurrency,string $currencyCode):IHoldCurrency;
}

<?php


namespace App\Libs;


use App\Contracts\ICurrencyConverter;
use App\Contracts\IHoldCurrency;
use App\Models\Currency;

class CurrencyConverter implements ICurrencyConverter
{
    public static function convert(IHoldCurrency $currencyHolder, string $currencyCode): IHoldCurrency
    {
        if(strtoupper($currencyCode)=='USD')
            return $currencyHolder;

        $targetCurrency= Currency::where('code','=',strtoupper($currencyCode))->first();
        $baseCurrency= Currency::where('code','=','USD')->first();
        $currencyHolder->setConvertedAmount($baseCurrency->rate * $targetCurrency->rate * $currencyHolder->getBaseAmount());
        return  $currencyHolder;
    }


}

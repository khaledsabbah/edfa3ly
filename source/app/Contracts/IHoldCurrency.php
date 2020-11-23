<?php


namespace App\Contracts;


interface IHoldCurrency
{
    public function setBaseAmount(float $amount);
    public function getBaseAmount();
    public function setConvertedAmount(float $amount);
    public function getConvertedAmount();
}

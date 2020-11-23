<?php


namespace App\Entities;


use App\Contracts\IEntity;
use App\Contracts\IHoldCurrency;
use Illuminate\Database\Eloquent\Model;

class ProductEntity implements IHoldCurrency, IEntity
{
    private $baseAmount;
    private $convertedAmount;

    public function setModel(Model $model)
    {
        $this->setBaseAmount($model->price);
        $this->setConvertedAmount($model->price);
        return $this;
    }

    public function getBaseAmount()
    {
        return $this->baseAmount;
    }

    public function setBaseAmount(float $amount)
    {
        $this->baseAmount= $amount;
        return $this;
    }

    public function setConvertedAmount(float $amount)
    {
        $this->convertedAmount= $amount;
        return $this;
    }

    public function getConvertedAmount()
    {
        return $this->convertedAmount;
    }
}

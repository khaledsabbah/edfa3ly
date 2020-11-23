<?php


namespace App\Entities;


use App\Contracts\IEntity;
use App\Contracts\IHoldCurrency;
use App\Contracts\IOffer;
use App\Models\Offer;
use Illuminate\Database\Eloquent\Model;

class ProductEntity implements IHoldCurrency, IEntity, IOffer
{
    private $baseAmount;
    private $convertedAmount;
    private $discount;
    private $model;

    public function __construct(Model $model)
    {
        $this->setModel($model)
            ->checkForOffers();
    }

    public function setModel(Model $model)
    {
        $this->model= $model;
        $this->setBaseAmount($model->price);
        $this->setConvertedAmount($model->price);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getModel():Model
    {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
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

    public function checkForOffers()
    {
        $offer= $this->getModel()->selfOffer;
        if ($offer){
            $this->discount= $offer->discount;
        }
        return $this;
    }
}

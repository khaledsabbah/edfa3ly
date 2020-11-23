<?php


namespace App\Entities;


use App\Contracts\IOffer;
use App\Libs\CurrencyConverter;
use App\Models\Offer;

class CartEntity
{
    private $products;

    public function __construct($products)
    {
        $this->setProducts($products)->checkForOffers();
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param $products
     * @return $this
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return bool
     */
    public function checkForOffers()
    {
        $offers = Offer::whereIn('related_product_id', $this->products->pluck('id'))->whereRaw('product_id != related_product_id')->get();
        return $this->outPutProducts($offers);
    }

    public function outPutProducts($offers=[])
    {
        $result=collect();
        foreach ($this->products as $product){
            $entity= new ProductEntity($product);

            if ($offers->count()>0){
                $offer= $offers->filter(function ($o)use($entity){
                    return $o->related_product_id==$entity->getModel()->id;
                })->first();
                if($offer){
                    if ($offer->amount >= $entity->getModel()->pivot->amount)
                        $entity->applyAnOffer($offer->discount);
                }
            }
            $result->push(CurrencyConverter::convert($entity, request()->header('x-currency')));
        }
        $this->products = $result;
    }
}

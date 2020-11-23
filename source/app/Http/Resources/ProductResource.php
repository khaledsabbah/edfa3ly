<?php

namespace App\Http\Resources;

use App\Entities\ProductEntity;
use App\Libs\CurrencyConverter;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $productEntity= (new ProductEntity())->setModel($this->resource);
        return [
          'name'=>$this->name,
          'price'=>CurrencyConverter::convert($productEntity,request()->header('x-currency'))->getConvertedAmount()
        ];
    }
}

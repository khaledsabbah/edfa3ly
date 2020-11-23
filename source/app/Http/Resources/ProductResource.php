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
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $productEntity = (new ProductEntity())
            ->setModel($this->resource)
            ->checkForOffers($this->resource);
        CurrencyConverter::convert($productEntity, request()->header('x-currency'));

        return array_merge(
            [
                'name' => $this->name,
                'price' => $productEntity->getConvertedAmount(),
                'discount' => $productEntity->getDiscount() ? $productEntity->getDiscount() . '%' : 0 . '%',
                'price_after_discount' => $productEntity->getConvertedAmount() - ($productEntity->getConvertedAmount() * $productEntity->getDiscount() / 100),
            ],
            isset($this->pivot) ? ['amount' => $this->pivot->amount] : []);
    }
}

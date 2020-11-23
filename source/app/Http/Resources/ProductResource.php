<?php

namespace App\Http\Resources;

use App\Entities\ProductEntity;
use App\Libs\CurrencyConverter;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $model = $this->getModel();
        $price = $this->getConvertedAmount();
        $result = [
            'name' => $model->name,
            'price' => $price.' '.request()->header('x-currency'),
            'discount' => $this->getDiscount() ? $this->getDiscount() . '% ('.($price * $this->getDiscount() / 100).' )' : 0,
            'price_after_discount' => $price - ($price * $this->getDiscount() / 100),
        ];
        $arr = [];
        if (isset($model->pivot)) {
            $totalPrice = $price * $model->pivot->amount;
            $arr = ['amount' => $model->pivot->amount];
            $arr['total_price'] = $totalPrice;
            $result['price_after_discount'] = $totalPrice - ($totalPrice * $this->getDiscount() / 100);
        }
        return array_merge($result,isset($model->pivot) ? $arr : []);
    }
}

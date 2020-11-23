<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class CartResource
 * @package App\Http\Resources
 */
class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $totalBeforeDiscount = 0;
        $totalAfterDiscount = 0;
        $discounts = [];
        $products = ProductResource::collection($this->getProducts());
        foreach ($products as $product) {
//            dd($product->jsonSerialize());
            $totalBeforeDiscount += $product->jsonSerialize()['total_price'];
            $totalAfterDiscount += $product->jsonSerialize()['price_after_discount'];
            if ($product->jsonSerialize()['discount']) {
                array_push($discounts, $product->jsonSerialize()['discount'] . ' off ' . $product->jsonSerialize()['name']);
            }
        }
        $tax = $totalBeforeDiscount * 14 / 100;
        return [
            'Subtotal'=>$totalBeforeDiscount,
            'Taxes'=>$tax,
            'Discounts'=>$discounts,
            'total'=>$totalAfterDiscount+$tax,
            'products' => $products
        ];
    }
}

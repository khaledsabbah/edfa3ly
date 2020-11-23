<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\ApiController;
use App\Http\Requests\AddToCartRequest;
use App\Http\Resources\CartResource;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends ApiController
{
    protected $service;

    public function __construct(CartService $cartService)
    {
        $this->service= $cartService;
    }

    public function addToCart(AddToCartRequest $request)
    {
        $this->service->addProductToCart($request->validated());
        return $this->respond(['Item Added Successfully']);
    }

    public function removeFromCart(Request $request)
    {
        $data= $request->validate(['product_id'=>'required|numeric']);
        $this->service->removeProductFromCart($data);
        return $this->respondDeleted();
    }

    public function index(Request $request)
    {
        $cart= $this->service->getCart();
        return $this->respond(new CartResource($cart));
    }

}

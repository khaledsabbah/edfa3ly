<?php


namespace App\Services;


use App\Entities\ProductEntity;
use App\Libs\CurrencyConverter;
use App\Repositories\CartRepository;

class CartService
{

    protected $repository;
    public function __construct(CartRepository $cartRepository)
    {
        $this->repository= $cartRepository;
    }

    public function addProductToCart(array $data)
    {
        return $this->repository->addToCart($data);

    }

    public function removeProductFromCart(array $data)
    {
        return $this->repository->removeFromCart($data);
    }

    public function getCart()
    {
        $cartProducts= $this->repository->getCartProducts();
        $result=collect();
        foreach ($cartProducts as $product){
            $result->push(CurrencyConverter::convert(new ProductEntity($product), request()->header('x-currency')));
        }
        return $result;

    }
}

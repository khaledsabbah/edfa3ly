<?php


namespace App\Services;


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
        return $this->repository->getCartProducts();

    }
}

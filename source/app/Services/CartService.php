<?php


namespace App\Services;


use App\Repositories\CartRepository;

class CartService extends AbstractService
{

    protected $repository;
    public function __construct(CartRepository $cartRepository)
    {
        $this->repository= $cartRepository;
    }
}

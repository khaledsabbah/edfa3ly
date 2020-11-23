<?php

namespace App\Repositories;


/**
 * Class CartRepository
 * @package App\Repositories
 */
class CartRepository extends AbstractRepository
{
    /**
     * @param array $data
     * @return mixed
     */
    public function addToCart(array $data)
    {
        $this->removeFromCart($data);
        return $this->getUser()->cart()->attach($data['product_id'],['amount'=>$data['amount']]);
    }

    /**
     * @param array $data
     */
    public function removeFromCart(array $data)
    {
        $this->getUser()->cart()->detach($data['product_id']);
    }

    /**
     * @return mixed
     */
    public function getCartProducts()
    {
        return $this->getUser()->cart;
    }
}

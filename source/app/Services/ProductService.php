<?php


namespace App\Services;


use App\Repositories\ProductRepository;

class ProductService
{
    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository= $repository;
    }

    public function listAllProducts($paginate = true)
    {
        return $this->repository->list($paginate);
    }
}

<?php


namespace App\Services;


use App\Entities\ProductEntity;
use App\Libs\CurrencyConverter;
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
        $products= $this->repository->list($paginate);
        $result=collect();
        foreach ($products as $product){
            $result->push(CurrencyConverter::convert(new ProductEntity($product), request()->header('x-currency')));
        }
        return $result;
    }
}

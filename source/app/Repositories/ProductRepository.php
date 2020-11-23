<?php


namespace App\Repositories;


use App\Models\Product;

class ProductRepository
{
    public function list($paginate=true)
    {
        return $paginate?Product::paginate():Product::all();
    }
}

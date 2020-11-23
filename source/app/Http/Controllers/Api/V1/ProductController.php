<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\ApiController;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends ApiController
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service= $service;
    }

    public function index(Request $request)
    {
        $products= $this->service->listAllProducts();
        return $this->respond(ProductResource::collection($products));
    }
}

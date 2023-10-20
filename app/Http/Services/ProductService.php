<?php

namespace App\Http\Services;

use App\Models\Media;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;

class ProductService
{
    protected ProductRepositoryInterface $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
//        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    public function store(Product $product): Product
    {
        return $this->productRepository->store($product);
    }


    public function update($request)
    {
    }
}

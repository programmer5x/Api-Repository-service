<?php

namespace App\Http\Controllers;

use App\Http\Services\MediaService;
use App\Http\Services\ProductService;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\Interfaces\MediaRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    public function __construct(ProductRepositoryInterface $productRepository,
                                ProductService             $productService,
                                MediaRepositoryInterface   $mediaRepository,
                                MediaService               $mediaService)
    {
        $this->productRepository = $productRepository;
        $this->productService = $productService;
        $this->mediaRepository = $mediaRepository;
        $this->mediaService = $mediaService;
    }


    public function index()
    {
        return $this->productRepository->all();
    }


    public function create()
    {
        //
    }


    public function store(StoreProductRequest $request)
    {
        $product = $this->productRepository->store($request);
        $this->mediaService->store($product, $request );
    }


    public function show(int $id)
    {
        return $this->productRepository->show($id);
    }


    public function edit(Product $product)
    {
        //
    }


    public function update(UpdateProductRequest $request, int $id)
    {
        $product = $this->productRepository->update($request, $id);
        $this->mediaService->update($product, $request);
    }


    public function destroy(int $id)
    {
        return $this->productRepository->destroy($id);
    }
}

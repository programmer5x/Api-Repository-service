<?php

namespace App\Http\Services;

use App\Models\Media;
use App\Repositories\Interfaces\MediaRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\MediaRepository;

class MediaService
{
    protected MediaRepositoryInterface $mediaRepository;
    protected ProductRepositoryInterface $productRepository;

    public function __construct()
    {
        $this->mediaRepository = app()->make(MediaRepositoryInterface::class);
        $this->productRepository = app()->make(ProductRepositoryInterface::class);
    }


    public function store($product, $request)
    {
        foreach ($request->file('images') as $item) {
            $image_name = rand(1, 99) . '.' . time() . '.' . $item->extension();
            $media[] =
                [
                    'images' => $image_name,
                    'product_id' => $product->id
                ];
            $this->mediaRepository->store($media);
        }
    }

    public function update($product, $request)
    {
            if ($request->delete) {
                $item = $request->delete;
            }
        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $image_name = rand(1, 99) . '-' . time() . '.' . $image->extension();
                $image->storeAs('images', $image_name);
                $this->mediaRepository->update($image_name, $product->id, $item);
            }
        }
    }
}

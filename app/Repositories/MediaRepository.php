<?php

namespace App\Repositories;

use App\Models\Media;
use App\Repositories\Interfaces\MediaRepositoryInterface;

class MediaRepository implements MediaRepositoryInterface
{
    public function store($media)
    {
        Media::insert($media);
    }

    public function update($image_name, $product, $item)
    {
        $object = new Media();
        $object->update([
            'images' => $image_name,
            'product_id' => $product
        ]);
            $object->where('id', $item)->delete();
    }
}

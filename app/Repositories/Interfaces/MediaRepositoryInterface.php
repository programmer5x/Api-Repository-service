<?php

namespace App\Repositories\Interfaces;

interface MediaRepositoryInterface
{
    public function store($media);

    public function update($image_name, $product, $item);
}

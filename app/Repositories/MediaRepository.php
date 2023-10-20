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

    public function update($media, $id)
    {
        $object = new Media();
        $object->insert($media);
        Media::find($id)->delete();
    }
}

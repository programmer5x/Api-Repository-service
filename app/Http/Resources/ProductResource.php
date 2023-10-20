<?php

namespace App\Http\Resources;

use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'body' => $this->body,
            'user_id' => $this->user_id,
            'user' => UserResource::make($this->whenLoaded('user')),
            'media' => MediaResource::collection($this->whenLoaded('media')),
            'category_id' => $this->category_id,
        ];
    }
}

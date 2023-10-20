<?php

namespace App\Repositories;

use App\Http\Resources\ProductResource;
use App\Models\Media;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
        return ProductResource::collection(Product::with('user')->get());
    }

    public function find(int $id)
    {
        return Product::find($id);
    }

    public function store($request): Product
    {
        $product = Product::create([
            'name' => $request->name,
            'body' => $request->body,
            'price' => $request->price,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ])->load('user');
        return $product;
    }

    public function show(int $id)
    {
        return $this->find($id);
    }

    public function update($request, int $id): Product
    {
        $product = $this->find($id);
        $product->update([
            'name' => $request->name,
            'body' => $request->body,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id
        ]);
        return $product;
    }

    public function destroy(int $id)
    {
        return $this->find($id)->delete();
    }
}

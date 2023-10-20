<?php

namespace App\Repositories\Interfaces;

use App\Models\Product;
use Illuminate\Support\Facades\Request;

interface ProductRepositoryInterface
{
    public function all();

    public function find(int $id);

    public function store(Request $request);

    public function show(int $id);

    public function update($request, int $id);

    public function destroy(int $id);
}

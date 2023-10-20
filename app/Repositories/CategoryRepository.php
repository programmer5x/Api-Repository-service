<?php

namespace App\Repositories;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\User;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function allCategories()
    {
        return CategoryResource::collection(Category::with('parent','children','user')->get());
    }

    public function findCategory(int $id)
    {
        return Category::find($id);
    }

    public function createCategory($request)
    {
        return Category::create($request->all());
    }

    public function updateCategory($request, int $id)
    {
        return $this->findCategory($id)->update($request->all());
    }

    public function deleteCategory($id)
    {
        $category = $this->findCategory($id);
        if (count($category->children) === 0) {
            return $category->delete();
        }else {
            return 'this is parent category';
        }
    }
}

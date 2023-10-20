<?php

namespace App\Repositories\Interfaces;

interface CategoryRepositoryInterface
{
    public function allCategories();

    public function findCategory(int $id);

    public function createCategory($request);

    public function updateCategory($request, int $id);

    public function deleteCategory(int $id);
}

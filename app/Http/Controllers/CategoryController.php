<?php

namespace App\Http\Controllers;

use App\Actions\CreateCategory;
use App\Actions\GetCategory;
use App\Http\Requests\Category\CreateCategoryRequest;

class CategoryController extends Controller
{
    public function store(CreateCategoryRequest $request, CreateCategory $createCategory)
    {
        $request->validated();
        $context = $request->only([
            'name'
        ]);

        return $createCategory->execute($context);
    }

    public function show(GetCategory $getCategory, $id)
    {
        return $getCategory->execute($id);
    }
}

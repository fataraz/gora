<?php

namespace App\Actions;

use App\Models\Category;

class GetCategory
{
    public function execute($id)
    {
        $category = Category::where('id', $id)->first();

        return response()->json($category);
    }
}

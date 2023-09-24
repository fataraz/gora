<?php

namespace App\Actions;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

use App\Models\Category;

class CreateCategory
{
    public function execute(array $data)
    {
        $data['id'] = Uuid::uuid4();
        $data['created_at'] = Carbon::now();
        $category = Category::create($data);

        $response = [
            'id' => $category->id,
            'name' => $category->name
        ];

        return response()->json($response, 201);
    }


}

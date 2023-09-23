<?php

namespace App\Actions;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

use Lorisleiva\Actions\Concerns\AsAction;

use App\Models\Category;
use App\Http\Requests\Category\CreateCategoryRequest;


class CreateCategory
{
    use AsAction;
    public function handle(array $data)
    {
        $category = new Category();
        $category->id = Uuid::uuid4();
        $category->name = $data["name"];
        $category->created_at = Carbon::now();
        $category->save();

        Logger("Success, Create category $category->name");

        return $category;
    }

    public function asController(CreateCategoryRequest $request)
    {
        $request->validated();
        $context = $request->only([
            'name'
        ]);

       $data = $this->handle(
            $context
        );

       return response()->json([
           'data' => $data
       ], 201);

    }


}

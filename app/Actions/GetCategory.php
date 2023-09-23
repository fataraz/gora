<?php

namespace App\Actions;

use App\Models\Category;
use Lorisleiva\Actions\Concerns\AsAction;


class GetCategory
{
    use AsAction;

    public function handle($id)
    {
        return Category::where('id', $id)->first();
    }

    public function asController($id)
    {
        $category = $this->handle($id);

        return [
            'id' => $category->id,
            'name' => $category->name
        ];

    }
}

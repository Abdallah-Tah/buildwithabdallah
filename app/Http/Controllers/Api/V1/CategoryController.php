<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return CategoryResource::collection(Category::query()->orderBy('name')->get());
    }

    public function store(StoreCategoryRequest $request): CategoryResource
    {
        $data = $request->validated();

        $category = Category::query()->create([
            ...$data,
            'slug' => $data['slug'] ?? Str::slug($data['name']),
        ]);

        return new CategoryResource($category);
    }
}

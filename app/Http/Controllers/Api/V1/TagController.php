<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return TagResource::collection(Tag::query()->orderBy('name')->get());
    }

    public function store(StoreTagRequest $request): TagResource
    {
        $data = $request->validated();

        $tag = Tag::query()->create([
            ...$data,
            'slug' => $data['slug'] ?? Str::slug($data['name']),
        ]);

        return new TagResource($tag);
    }
}

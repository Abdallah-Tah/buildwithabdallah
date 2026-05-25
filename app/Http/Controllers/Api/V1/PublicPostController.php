<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PublicPostController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return PostResource::collection(
            Post::query()->with(['category', 'tags'])->published()->latest('published_at')->paginate(12)
        );
    }

    public function show(Post $post): PostResource
    {
        abort_unless($post->status === 'published', 404);

        return new PostResource($post->load(['category', 'tags']));
    }
}

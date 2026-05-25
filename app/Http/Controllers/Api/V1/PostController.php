<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return PostResource::collection(
            Post::query()->with(['category', 'tags'])->latest()->paginate(15)
        );
    }

    public function store(StorePostRequest $request): PostResource
    {
        $data = $request->validated();
        $publish = (bool) ($data['publish'] ?? false);
        unset($data['publish']);

        $post = Post::query()->create([
            ...$data,
            'user_id' => $request->user()?->id,
            'slug' => $data['slug'] ?? Str::slug($data['title']),
            'status' => $publish ? 'published' : ($data['status'] ?? 'draft'),
            'published_at' => $publish ? ($data['published_at'] ?? now()) : ($data['published_at'] ?? null),
            'featured' => (bool) ($data['featured'] ?? false),
        ]);

        $post->tags()->sync($data['tags'] ?? []);

        return new PostResource($post->load(['category', 'tags']));
    }

    public function show(Post $post): PostResource
    {
        return new PostResource($post->load(['category', 'tags']));
    }

    public function update(UpdatePostRequest $request, Post $post): PostResource
    {
        $data = $request->validated();
        $publish = array_key_exists('publish', $data) ? (bool) $data['publish'] : null;
        unset($data['publish']);

        $post->fill([
            ...$data,
            'slug' => $data['slug'] ?? $post->slug,
        ]);

        if ($publish === true) {
            $post->status = 'published';
            $post->published_at = $data['published_at'] ?? $post->published_at ?? now();
        }

        if (array_key_exists('featured', $data)) {
            $post->featured = (bool) $data['featured'];
        }

        $post->save();

        if (array_key_exists('tags', $data)) {
            $post->tags()->sync($data['tags'] ?? []);
        }

        return new PostResource($post->load(['category', 'tags']));
    }

    public function destroy(Post $post): JsonResponse
    {
        $post->delete();

        return response()->json(['message' => 'Post deleted.']);
    }

    public function publish(Post $post): PostResource
    {
        $post->update([
            'status' => 'published',
            'published_at' => $post->published_at ?? now(),
        ]);

        return new PostResource($post->load(['category', 'tags']));
    }

    public function unpublish(Post $post): PostResource
    {
        $post->update(['status' => 'draft']);

        return new PostResource($post->load(['category', 'tags']));
    }
}

<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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

    public function store(StorePostRequest $request): JsonResponse
    {
        $data = $request->validated();
        $publish = (bool) ($data['publish'] ?? false);

        $categoryId = $this->resolveCategoryId($data);
        $tagIds = array_key_exists('tags', $data) ? $this->resolveTagIds($data['tags'] ?? []) : null;

        $slug = ($data['slug'] ?? null) ?: Str::slug($data['title']);
        $existing = Post::query()->where('slug', $slug)->first();

        unset($data['publish'], $data['category'], $data['category_id'], $data['tags'], $data['slug']);

        // Idempotent: re-posting the same slug updates the existing post.
        $post = $existing ?? new Post();
        $post->fill([
            ...$data,
            'slug' => $slug,
            'user_id' => $post->user_id ?? $request->user()?->id,
        ]);

        if ($categoryId !== null) {
            $post->category_id = $categoryId;
        }

        if (array_key_exists('featured', $data)) {
            $post->featured = (bool) $data['featured'];
        }

        // Publish/status: only move the post forward, never silently unpublish
        // a live post just because a re-run omitted `publish`.
        if ($publish) {
            $post->status = 'published';
            $post->published_at = $data['published_at'] ?? $post->published_at ?? now();
        } elseif (! $existing) {
            $post->status = $data['status'] ?? 'draft';
            $post->published_at = $data['published_at'] ?? null;
        } elseif (array_key_exists('status', $data)) {
            $post->status = $data['status'];
        }

        $post->save();

        if ($tagIds !== null) {
            $post->tags()->sync($tagIds);
        }

        return (new PostResource($post->load(['category', 'tags'])))
            ->response()
            ->setStatusCode($existing ? 200 : 201);
    }

    public function show(Post $post): PostResource
    {
        return new PostResource($post->load(['category', 'tags']));
    }

    public function update(UpdatePostRequest $request, Post $post): PostResource
    {
        $data = $request->validated();
        $publish = array_key_exists('publish', $data) ? (bool) $data['publish'] : null;

        $categoryId = $this->resolveCategoryId($data);
        $tagIds = array_key_exists('tags', $data) ? $this->resolveTagIds($data['tags'] ?? []) : null;

        unset($data['publish'], $data['category'], $data['category_id'], $data['tags']);

        $post->fill([
            ...$data,
            'slug' => $data['slug'] ?? $post->slug,
        ]);

        if ($categoryId !== null) {
            $post->category_id = $categoryId;
        }

        if ($publish === true) {
            $post->status = 'published';
            $post->published_at = $data['published_at'] ?? $post->published_at ?? now();
        }

        if (array_key_exists('featured', $data)) {
            $post->featured = (bool) $data['featured'];
        }

        $post->save();

        if ($tagIds !== null) {
            $post->tags()->sync($tagIds);
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

    /**
     * Resolve a category from `category_id` (numeric) or `category`
     * (id, name, or slug). Unknown names are created on the fly.
     */
    private function resolveCategoryId(array $data): ?int
    {
        if (! empty($data['category_id'])) {
            return (int) $data['category_id'];
        }

        $value = $data['category'] ?? null;
        if ($value === null || $value === '') {
            return null;
        }

        if (is_numeric($value)) {
            return Category::query()->whereKey((int) $value)->value('id');
        }

        $slug = Str::slug($value);

        return Category::query()->firstOrCreate(
            ['slug' => $slug],
            ['name' => $value, 'type' => 'post'],
        )->id;
    }

    /**
     * Resolve tags from a mix of ids and names. Unknown names are created.
     *
     * @param  array<int, string|int>  $tags
     * @return array<int, int>
     */
    private function resolveTagIds(array $tags): array
    {
        $ids = [];

        foreach ($tags as $tag) {
            if ($tag === null || $tag === '') {
                continue;
            }

            if (is_numeric($tag)) {
                if ($id = Tag::query()->whereKey((int) $tag)->value('id')) {
                    $ids[] = $id;
                }

                continue;
            }

            $slug = Str::slug($tag);
            $ids[] = Tag::query()->firstOrCreate(
                ['slug' => $slug],
                ['name' => $tag],
            )->id;
        }

        return array_values(array_unique($ids));
    }
}

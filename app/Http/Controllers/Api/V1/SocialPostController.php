<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSocialPostRequest;
use App\Http\Requests\UpdateSocialPostRequest;
use App\Http\Resources\SocialPostResource;
use App\Models\Post;
use App\Models\SocialPost;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class SocialPostController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $query = SocialPost::query()->with(['post', 'video'])->latest();

        if ($platform = $request->string('platform')->toString()) {
            $query->where('platform', $platform);
        }

        if ($status = $request->string('status')->toString()) {
            $query->where('status', $status);
        }

        if ($postId = $request->integer('post_id')) {
            $query->where('post_id', $postId);
        }

        if ($videoId = $request->integer('video_id')) {
            $query->where('video_id', $videoId);
        }

        return SocialPostResource::collection($query->paginate(15));
    }

    public function store(StoreSocialPostRequest $request): SocialPostResource
    {
        $data = $request->validated();
        $this->assertRevisionIsDistributable($data);

        $attributes = [
            ...$data,
            'status' => $data['status'] ?? 'draft',
            'published_at' => ($data['status'] ?? null) === 'published'
                ? ($data['published_at'] ?? now())
                : ($data['published_at'] ?? null),
        ];
        $socialPost = ! empty($data['post_id'])
            ? SocialPost::query()->firstOrCreate([
                'post_id' => $data['post_id'],
                'platform' => $data['platform'],
                'content_hash' => $data['content_hash'],
            ], $attributes)
            : SocialPost::query()->create($attributes);

        return new SocialPostResource($socialPost->load(['post', 'video']));
    }

    public function show(SocialPost $socialPost): SocialPostResource
    {
        return new SocialPostResource($socialPost->load(['post', 'video']));
    }

    public function update(UpdateSocialPostRequest $request, SocialPost $socialPost): SocialPostResource
    {
        $data = $request->validated();

        if (($data['status'] ?? null) === 'published' && ! array_key_exists('published_at', $data)) {
            $data['published_at'] = $socialPost->published_at ?? now();
        }

        $socialPost->update($data);

        return new SocialPostResource($socialPost->load(['post', 'video']));
    }

    public function destroy(SocialPost $socialPost): JsonResponse
    {
        $socialPost->delete();

        return response()->json(['message' => 'Social post deleted.']);
    }

    public function publish(Request $request, SocialPost $socialPost): SocialPostResource
    {
        $data = $request->validate([
            'published_url' => ['nullable', 'url', 'max:2048'],
            'external_id' => ['nullable', 'string', 'max:255'],
            'published_at' => ['nullable', 'date'],
            'meta' => ['nullable', 'array'],
        ]);
        $this->assertRevisionIsDistributable($socialPost->toArray());

        $socialPost->update([
            'status' => 'published',
            'published_url' => $data['published_url'] ?? $socialPost->published_url,
            'external_id' => $data['external_id'] ?? $socialPost->external_id,
            'published_at' => $data['published_at'] ?? $socialPost->published_at ?? now(),
            'meta' => $data['meta'] ?? $socialPost->meta,
        ]);

        return new SocialPostResource($socialPost->load(['post', 'video']));
    }

    private function assertRevisionIsDistributable(array $data): void
    {
        if (empty($data['post_id'])) {
            return;
        }

        $post = Post::query()->findOrFail($data['post_id']);
        if (($data['content_hash'] ?? null) !== $post->content_hash || empty($data['live_verified_at'])) {
            throw ValidationException::withMessages([
                'content_hash' => 'Social distribution requires a live-verified hash matching the current article revision.',
            ]);
        }
    }

    public function unpublish(SocialPost $socialPost): SocialPostResource
    {
        $socialPost->update([
            'status' => 'draft',
            'published_url' => null,
            'external_id' => null,
            'published_at' => null,
        ]);

        return new SocialPostResource($socialPost->load(['post', 'video']));
    }
}

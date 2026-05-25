<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Http\Resources\VideoResource;
use App\Models\Video;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return VideoResource::collection(
            Video::query()->with(['category', 'tags'])->latest()->paginate(15)
        );
    }

    public function store(StoreVideoRequest $request): VideoResource
    {
        $data = $request->validated();
        $publish = (bool) ($data['publish'] ?? false);
        unset($data['publish']);

        $video = Video::query()->create([
            ...$data,
            'user_id' => $request->user()?->id,
            'slug' => $data['slug'] ?? Str::slug($data['title']),
            'status' => $publish ? 'published' : ($data['status'] ?? 'draft'),
            'published_at' => $publish ? ($data['published_at'] ?? now()) : ($data['published_at'] ?? null),
            'featured' => (bool) ($data['featured'] ?? false),
        ]);

        $video->tags()->sync($data['tags'] ?? []);

        return new VideoResource($video->load(['category', 'tags']));
    }

    public function show(Video $video): VideoResource
    {
        return new VideoResource($video->load(['category', 'tags']));
    }

    public function update(UpdateVideoRequest $request, Video $video): VideoResource
    {
        $data = $request->validated();
        $publish = array_key_exists('publish', $data) ? (bool) $data['publish'] : null;
        unset($data['publish']);

        $video->fill([
            ...$data,
            'slug' => $data['slug'] ?? $video->slug,
        ]);

        if ($publish === true) {
            $video->status = 'published';
            $video->published_at = $data['published_at'] ?? $video->published_at ?? now();
        }

        if (array_key_exists('featured', $data)) {
            $video->featured = (bool) $data['featured'];
        }

        $video->save();

        if (array_key_exists('tags', $data)) {
            $video->tags()->sync($data['tags'] ?? []);
        }

        return new VideoResource($video->load(['category', 'tags']));
    }

    public function destroy(Video $video): JsonResponse
    {
        $video->delete();

        return response()->json(['message' => 'Video deleted.']);
    }

    public function publish(Video $video): VideoResource
    {
        $video->update([
            'status' => 'published',
            'published_at' => $video->published_at ?? now(),
        ]);

        return new VideoResource($video->load(['category', 'tags']));
    }

    public function unpublish(Video $video): VideoResource
    {
        $video->update(['status' => 'draft']);

        return new VideoResource($video->load(['category', 'tags']));
    }
}

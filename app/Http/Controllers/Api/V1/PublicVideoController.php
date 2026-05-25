<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;
use App\Models\Video;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PublicVideoController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return VideoResource::collection(
            Video::query()->with(['category', 'tags'])->published()->latest('published_at')->paginate(12)
        );
    }

    public function show(Video $video): VideoResource
    {
        abort_unless($video->status === 'published', 404);

        return new VideoResource($video->load(['category', 'tags']));
    }
}

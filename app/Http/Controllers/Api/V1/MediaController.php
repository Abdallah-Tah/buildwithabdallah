<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return MediaResource::collection(Media::query()->latest()->paginate(24));
    }

    public function store(StoreMediaRequest $request): MediaResource
    {
        $file = $request->file('file');
        $storedPath = $file->store('uploads', 'public');

        $media = Media::query()->create([
            'user_id' => $request->user()?->id,
            'title' => $request->string('title')->toString() ?: pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
            'original_name' => $file->getClientOriginalName(),
            'file_name' => Str::afterLast($storedPath, '/'),
            'disk' => 'public',
            'path' => $storedPath,
            'mime_type' => $file->getClientMimeType(),
            'size' => $file->getSize(),
            'alt_text' => $request->string('alt_text')->toString(),
        ]);

        return new MediaResource($media);
    }

    public function destroy(Media $media): JsonResponse
    {
        Storage::disk($media->disk)->delete($media->path);
        $media->delete();

        return response()->json(['message' => 'Media deleted.']);
    }
}

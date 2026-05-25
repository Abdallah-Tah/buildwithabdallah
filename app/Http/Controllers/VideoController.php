<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\View\View;

class VideoController extends Controller
{
    public function index(): View
    {
        return view('pages.videos.index', [
            'videos' => Video::query()->with(['category', 'tags'])->published()->latest('published_at')->paginate(9),
        ]);
    }

    public function show(Video $video): View
    {
        abort_unless($video->status === 'published', 404);

        return view('pages.videos.show', [
            'video' => $video->load(['category', 'tags']),
            'relatedVideos' => Video::query()
                ->published()
                ->whereKeyNot($video->id)
                ->latest('published_at')
                ->take(3)
                ->get(),
        ]);
    }
}

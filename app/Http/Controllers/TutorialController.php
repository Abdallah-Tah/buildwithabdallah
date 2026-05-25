<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class TutorialController extends Controller
{
    public function index(): View
    {
        return view('pages.tutorials.index', [
            'posts' => Post::query()->with(['category', 'tags'])->published()->latest('published_at')->paginate(9),
        ]);
    }

    public function show(Post $post): View
    {
        abort_unless($post->status === 'published', 404);

        return view('pages.tutorials.show', [
            'post' => $post->load(['category', 'tags']),
            'relatedPosts' => Post::query()
                ->published()
                ->whereKeyNot($post->id)
                ->latest('published_at')
                ->take(3)
                ->get(),
        ]);
    }
}

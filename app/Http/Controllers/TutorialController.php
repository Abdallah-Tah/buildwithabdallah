<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TutorialController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->string('search'));
        $categorySlug = trim((string) $request->string('category'));

        $query = Post::query()->with(['category', 'tags'])->published()->latest('published_at');

        if ($search !== '') {
            $query->where(function ($q) use ($search): void {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('body', 'like', "%{$search}%");
            });
        }

        if ($categorySlug !== '') {
            $query->whereHas('category', fn ($q) => $q->where('slug', $categorySlug));
        }

        return view('pages.tutorials.index', [
            'featuredTutorial' => Post::query()->with(['category', 'tags'])->published()->where('featured', true)->latest('published_at')->first(),
            'posts' => $query->paginate(9)->withQueryString(),
            'categories' => Category::query()->where(fn ($q) => $q->where('type', 'post')->orWhereNull('type'))->orderBy('name')->get(),
            'activeCategory' => $categorySlug,
            'search' => $search,
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

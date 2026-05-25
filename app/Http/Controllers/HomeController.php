<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Video;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $services = [
            ['title' => 'Custom Web Applications', 'description' => 'Laravel and PHP apps built around real business workflows and internal operations.'],
            ['title' => 'Business Automation', 'description' => 'Automate repetitive work, alerts, approvals, and data flows without fragile glue.'],
            ['title' => 'API Development', 'description' => 'Secure APIs for dashboards, clients, integrations, and Taco automation.'],
            ['title' => 'Legacy System Modernization', 'description' => 'Move from spreadsheets and brittle tools to maintainable business software.'],
            ['title' => 'Laravel / PHP Development', 'description' => 'Professional backend systems, admin panels, and content platforms that stay clean.'],
            ['title' => 'Technical Tutorials and Training', 'description' => 'Practical tutorials, implementation notes, and technical guidance teams can use.'],
        ];

        return view('pages.home', [
            'services' => $services,
            'featuredTutorial' => Post::query()->with(['category', 'tags'])->published()->where('featured', true)->latest('published_at')->first(),
            'latestTutorials' => Post::query()->with(['category', 'tags'])->published()->latest('published_at')->take(3)->get(),
            'latestVideos' => Video::query()->with(['category', 'tags'])->published()->latest('published_at')->take(3)->get(),
            'tutorialCategories' => Category::query()->where(fn ($q) => $q->where('type', 'post')->orWhereNull('type'))->orderBy('name')->get(),
        ]);
    }
}

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
            ['title' => 'Custom Software Development', 'description' => 'Secure web applications, internal platforms, dashboards, portals and operational tools.'],
            ['title' => 'Legacy System Modernization', 'description' => 'Incrementally improve aging applications, databases, workflows and architecture.'],
            ['title' => 'Systems Integration & APIs', 'description' => 'Connect internal systems, third-party services, payments and data workflows reliably.'],
            ['title' => 'Automation & AI', 'description' => 'Reduce repetitive work with monitored automation and approval-based intelligent tools.'],
            ['title' => 'Data & Reporting', 'description' => 'Database design, data integration, transformation and operational reporting.'],
            ['title' => 'Application Maintenance & Support', 'description' => 'Bug fixes, upgrades, monitoring, deployment, documentation and continued development.'],
        ];

        $proofPoints = [
            'Maine-based',
            '8+ years software experience',
            'Custom software',
            'Systems integration',
            'Secure development',
            'Long-term support',
        ];

        return view('pages.home', [
            'services' => $services,
            'proofPoints' => $proofPoints,
            'featuredTutorial' => Post::query()->with(['category', 'tags'])->published()->where('featured', true)->latest('published_at')->first(),
            'latestTutorials' => Post::query()->with(['category', 'tags'])->published()->latest('published_at')->take(3)->get(),
            'latestVideos' => Video::query()->with(['category', 'tags'])->published()->latest('published_at')->take(3)->get(),
            'tutorialCategories' => Category::query()->where(fn ($q) => $q->where('type', 'post')->orWhereNull('type'))->orderBy('name')->get(),
        ]);
    }
}

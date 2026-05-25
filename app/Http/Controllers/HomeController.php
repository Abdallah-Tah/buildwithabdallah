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
            ['title' => 'Business Websites', 'description' => 'Professional websites and landing pages that explain your offer clearly and capture leads.'],
            ['title' => 'Dashboards and Internal Tools', 'description' => 'Laravel dashboards, admin panels, and reporting systems for real operations.'],
            ['title' => 'AI Agents and Telegram Bots', 'description' => 'Approval-based agents for alerts, research, support, content workflows, and business monitoring.'],
            ['title' => 'API Integrations', 'description' => 'Connect Stripe, GitHub, CRMs, forms, spreadsheets, and internal systems without brittle manual steps.'],
            ['title' => 'Automation Workflows', 'description' => 'Replace repetitive email, spreadsheet, and reporting work with small reliable systems.'],
            ['title' => 'MVP Builds', 'description' => 'Lean product builds with Laravel, APIs, clean UI, and an admin workflow you can actually use.'],
        ];

        $proofPoints = [
            'Full-stack software developer at Kyocera AVX',
            'Computer Science student at the University of Southern Maine',
            'Builds real AI agent, Telegram, GitHub, dashboard, and API workflows',
            'Works across Laravel, PHP, Python, React, APIs, automation, and deployment',
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

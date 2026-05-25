<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Video;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $services = [
            ['title' => 'Custom Web Applications', 'description' => 'Laravel and PHP applications built around real business workflows.'],
            ['title' => 'Business Automation', 'description' => 'Internal tools, integrations, alerts, and repetitive-task automation.'],
            ['title' => 'API Development', 'description' => 'Secure APIs for mobile apps, dashboards, and bots like Taco.'],
            ['title' => 'Legacy System Modernization', 'description' => 'Turn slow manual systems into maintainable web software.'],
            ['title' => 'Laravel / PHP Development', 'description' => 'Clean backend systems, admin panels, and content platforms.'],
            ['title' => 'Technical Tutorials and Training', 'description' => 'Practical tutorials, walkthroughs, and team-friendly teaching.'],
        ];

        return view('pages.home', [
            'services' => $services,
            'featuredPosts' => Post::query()->with(['category', 'tags'])->published()->latest('published_at')->take(3)->get(),
            'latestVideos' => Video::query()->with(['category', 'tags'])->published()->latest('published_at')->take(3)->get(),
        ]);
    }
}

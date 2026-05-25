<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ServiceController extends Controller
{
    public function __invoke(): View
    {
        $services = [
            [
                'title' => 'Starter Website',
                'description' => 'A clean business website or landing page with clear copy, contact flow, and responsive design. Starting from $499.',
            ],
            [
                'title' => 'Business Dashboard',
                'description' => 'A Laravel dashboard for reports, admin workflows, status tracking, and internal visibility. Quote after review.',
            ],
            [
                'title' => 'AI Agent or Telegram Bot',
                'description' => 'A monitored agent for alerts, research, follow-ups, summaries, and approval-based actions. Starting from $799.',
            ],
            [
                'title' => 'API Integration',
                'description' => 'Connect Stripe, GitHub, forms, CRMs, email, dashboards, or existing tools. Quote after review.',
            ],
            [
                'title' => 'Automation Workflow',
                'description' => 'Turn repetitive spreadsheet, email, and reporting work into reliable automated steps. Starting from $799.',
            ],
            [
                'title' => 'MVP or Internal Tool',
                'description' => 'A practical product, portal, or internal app with database, admin, API, and deployment support. Quote after review.',
            ],
        ];

        return view('pages.services', compact('services'));
    }
}

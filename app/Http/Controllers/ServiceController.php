<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ServiceController extends Controller
{
    public function __invoke(): View
    {
        $services = [
            [
                'title' => 'Custom Software Development',
                'description' => 'Secure web applications, internal platforms, dashboards, SaaS systems, portals and operational tools using Laravel, PHP, Python, React, Livewire and modern SQL databases.',
            ],
            [
                'title' => 'Legacy System Modernization',
                'description' => 'Legacy PHP modernization, desktop-to-web migrations, database improvements, API enablement, security improvements and incremental replacement strategies.',
            ],
            [
                'title' => 'Systems Integration & APIs',
                'description' => 'REST APIs, third-party services, data synchronization, webhooks, authentication, background processing, payment platforms and enterprise databases.',
            ],
            [
                'title' => 'Automation & AI',
                'description' => 'Workflow automation, document processing, alerts, monitoring, scheduled processing and AI-assisted tools with appropriate human approval.',
            ],
            [
                'title' => 'Data & Reporting',
                'description' => 'SQL Server, PostgreSQL and MySQL solutions for database design, data integration, transformation, synchronization and operational dashboards.',
            ],
            [
                'title' => 'Application Maintenance & Support',
                'description' => 'Existing application support, bug fixes, security and dependency updates, performance improvements, monitoring, deployment, documentation and feature enhancements.',
            ],
        ];

        return view('pages.services', compact('services'));
    }
}

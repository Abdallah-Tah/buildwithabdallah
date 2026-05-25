<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ServiceController extends Controller
{
    public function __invoke(): View
    {
        $services = [
            [
                'title' => 'Custom Web Applications',
                'description' => 'Purpose-built applications for dashboards, portals, and internal operations.',
            ],
            [
                'title' => 'Business Automation',
                'description' => 'Automate approvals, notifications, data sync, and repetitive work that wastes time.',
            ],
            [
                'title' => 'API Development',
                'description' => 'Design and build secure APIs for mobile apps, dashboards, integrations, and bots.',
            ],
            [
                'title' => 'Legacy System Modernization',
                'description' => 'Upgrade fragile spreadsheets and aging tools into maintainable modern software.',
            ],
            [
                'title' => 'Laravel / PHP Development',
                'description' => 'Reliable Laravel builds for product MVPs, content systems, and business operations.',
            ],
            [
                'title' => 'Technical Tutorials and Training',
                'description' => 'Clear tutorials, code walkthroughs, and practical training for teams and builders.',
            ],
        ];

        return view('pages.services', compact('services'));
    }
}

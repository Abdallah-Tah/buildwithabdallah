<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        // Cache for an hour — crawlers hit this often and the content rarely
        // changes. Cleared implicitly when the cache key expires.
        $xml = Cache::remember('sitemap.xml', now()->addHour(), function () {
            return $this->build();
        });

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }

    private function build(): string
    {
        $urls = [];

        // Static pages (route name => [changefreq, priority]).
        $static = [
            'home' => ['weekly', '1.0'],
            'services' => ['monthly', '0.8'],
            'government' => ['monthly', '0.8'],
            'government.capability-statement' => ['monthly', '0.6'],
            'manufacturing' => ['monthly', '0.9'],
            'about' => ['monthly', '0.7'],
            'tutorials.index' => ['daily', '0.9'],
            'videos.index' => ['weekly', '0.7'],
            'newsletter.index' => ['monthly', '0.5'],
            'contact.index' => ['monthly', '0.5'],
            'privacy' => ['yearly', '0.3'],
            'terms' => ['yearly', '0.3'],
        ];
        foreach ($static as $name => [$freq, $priority]) {
            $urls[] = ['loc' => route($name), 'lastmod' => null, 'freq' => $freq, 'priority' => $priority];
        }

        foreach (array_keys(config('case-studies')) as $caseStudy) {
            $urls[] = ['loc' => route('case-studies.show', $caseStudy), 'lastmod' => null, 'freq' => 'yearly', 'priority' => '0.7'];
        }

        // Published posts.
        foreach (Post::published()->get(['slug', 'updated_at']) as $post) {
            $urls[] = [
                'loc' => route('tutorials.show', $post->slug),
                'lastmod' => $post->updated_at?->toAtomString(),
                'freq' => 'monthly',
                'priority' => '0.8',
            ];
        }

        // Published videos.
        foreach (Video::published()->get(['slug', 'updated_at']) as $video) {
            $urls[] = [
                'loc' => route('videos.show', $video->slug),
                'lastmod' => $video->updated_at?->toAtomString(),
                'freq' => 'monthly',
                'priority' => '0.6',
            ];
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
        foreach ($urls as $u) {
            $xml .= "  <url>\n";
            $xml .= '    <loc>'.e($u['loc'])."</loc>\n";
            if ($u['lastmod']) {
                $xml .= '    <lastmod>'.$u['lastmod']."</lastmod>\n";
            }
            $xml .= '    <changefreq>'.$u['freq']."</changefreq>\n";
            $xml .= '    <priority>'.$u['priority']."</priority>\n";
            $xml .= "  </url>\n";
        }
        $xml .= '</urlset>';

        return $xml;
    }
}

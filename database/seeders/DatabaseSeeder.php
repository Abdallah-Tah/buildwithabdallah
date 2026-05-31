<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::query()->updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@buildwithabdallah.com')],
            [
                'name' => env('ADMIN_NAME', 'Abdallah Mohamed'),
                'password' => env('ADMIN_PASSWORD', 'ChangeMe123!'),
                'is_admin' => true,
            ],
        );

        $categories = collect([
            ['name' => 'Automation', 'type' => 'post'],
            ['name' => 'APIs', 'type' => 'post'],
            ['name' => 'Laravel', 'type' => 'post'],
            ['name' => 'Tutorial', 'type' => 'post'],
            ['name' => 'News', 'type' => 'post'],
            ['name' => 'Videos', 'type' => 'video'],
        ])->map(fn (array $category) => Category::query()->updateOrCreate(
            ['slug' => Str::slug($category['name'])],
            [...$category, 'slug' => Str::slug($category['name']), 'description' => $category['name'].' content and updates.'],
        ));

        $tags = collect(['PHP', 'Laravel', 'Automation', 'API', 'Tutorial'])->map(fn (string $name) => Tag::query()->updateOrCreate(
            ['slug' => Str::slug($name)],
            ['name' => $name, 'slug' => Str::slug($name)],
        ));

        $post = Post::query()->updateOrCreate(
            ['slug' => 'ship-a-business-dashboard-with-laravel'],
            [
                'user_id' => $admin->id,
                'category_id' => $categories->firstWhere('slug', 'laravel')?->id,
                'title' => 'How I structure a business dashboard with Laravel',
                'excerpt' => 'A practical implementation note on moving from manual spreadsheet work to a clean dashboard and admin workflow.',
                'body' => <<<MD
# How I structure a business dashboard with Laravel

This implementation note shows how I structure a clean Laravel MVP for a small business:

- define the data model first
- keep the public site fast and simple
- expose protected JSON endpoints for automation
- deploy locally before touching cloud infra

## Why this stack works

Laravel gives you routing, jobs, auth, and API structure without wasting time on boilerplate.

## What to build first

1. Public pages that build trust
2. Admin panel for content
3. Protected API for automation
4. Deployment on your own hardware

## Business result

You get something useful fast, and you can improve it without rebuilding everything later.
MD,
                'status' => 'published',
                'featured' => true,
                'published_at' => now()->subDay(),
                'meta_title' => 'Laravel business dashboard structure',
                'meta_description' => 'A practical Laravel dashboard MVP structure with admin and API support.',
            ],
        );
        $post->tags()->sync($tags->take(4)->pluck('id'));

        $this->call([
            ClaudeLatencyPostSeeder::class,
            OpenAIIpoPostSeeder::class,
        ]);
    }
}

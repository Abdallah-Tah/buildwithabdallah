<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class OpenAIIpoPostSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'admin@buildwithabdallah.com')->firstOrFail();
        $category = Category::updateOrCreate(
            ['slug' => 'news'],
            ['name' => 'News', 'type' => 'post', 'description' => 'AI industry news, product launches, and market updates.']
        );

        $tagData = [
            ['name' => 'OpenAI', 'slug' => 'openai'],
            ['name' => 'IPO', 'slug' => 'ipo'],
            ['name' => 'AI', 'slug' => 'ai'],
            ['name' => 'Tech News', 'slug' => 'tech-news'],
            ['name' => 'Venture Capital', 'slug' => 'venture-capital'],
            ['name' => 'Anthropic', 'slug' => 'anthropic'],
        ];
        $tagIds = [];
        foreach ($tagData as $t) {
            $tag = Tag::updateOrCreate(['slug' => $t['slug']], ['name' => $t['name'], 'slug' => $t['slug']]);
            $tagIds[] = $tag->id;
        }

        $body = <<<'BODY'
# OpenAI Files for $1 Trillion IPO — What It Means for AI Builders

OpenAI just filed for a $1 trillion IPO. Target: September–November 2026. Goldman Sachs and Morgan Stanley running the book.

## The Numbers

- $25 billion ARR
- $2 billion per month revenue
- 900M weekly active users
- 50M paying subscribers
- Still losing ~$14B/year

## The Real Story

The AI industry's venture-capital era is ending. Public market discipline is coming. First quarterly earnings will set the valuation framework for every AI company that follows.

OpenAI is filing first to set the narrative before Wall Street has a profitable competitor as comparison. Meanwhile Anthropic just posted its first profit: $559M on $10.9B revenue.

## What This Means for Builders

For developers and businesses using AI: the model landscape is shifting from "who has the best benchmark" to "who can deliver sustainable value." Public companies face different pressure than venture-backed ones. Expect more pricing transparency, clearer SLAs, and slower feature rollouts in exchange for stability.

Build With Abdallah helps businesses navigate AI tooling, build automation, and integrate models that actually deliver ROI.
BODY;

        $post = Post::updateOrCreate(
            ['slug' => 'openai-ipo-2026'],
            [
                'user_id' => $user->id,
                'category_id' => $category->id,
                'title' => 'OpenAI Files for $1 Trillion IPO — What It Means for AI Builders',
                'excerpt' => 'OpenAI just filed for a $1 trillion IPO with Goldman Sachs and Morgan Stanley. Meanwhile Anthropic posted its first profit. Here is what the AI industry shift means for developers and businesses.',
                'body' => $body,
                'cover_image' => 'images/tutorials/openai-ipo-2026.png',
                'status' => 'published',
                'featured' => false,
                'published_at' => '2026-05-29 09:00:00',
                'meta_title' => 'OpenAI IPO 2026: What the $1T Filing Means for AI Builders',
                'meta_description' => 'OpenAI filed for a $1 trillion IPO. Here is what the numbers mean and how the shift to public markets affects AI builders and businesses.',
            ]
        );
        $post->tags()->sync($tagIds);
        $this->command->info("Post created: {$post->slug} (ID: {$post->id})");
    }
}

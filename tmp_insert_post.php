<?php

require __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'sqlite',
    'database' => __DIR__ . '/database/database.sqlite',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$body = '<h1>OpenAI Files for $1 Trillion IPO</h1>

<p>OpenAI just filed for a $1 trillion IPO. Target: September–November 2026. Goldman Sachs and Morgan Stanley running the book.</p>

<h2>The Numbers</h2>
<ul>
<li>$25 billion ARR</li>
<li>$2 billion per month revenue</li>
<li>900M weekly active users</li>
<li>50M paying subscribers</li>
<li>Still losing ~$14B/year</li>
</ul>

<h2>The Real Story</h2>
<p>The AI industry\'s venture-capital era is ending. Public market discipline is coming. First quarterly earnings will set the valuation framework for every AI company that follows.</p>

<p>OpenAI is filing first to set the narrative before Wall Street has a profitable competitor as comparison. Meanwhile Anthropic just posted its first profit: $559M on $10.9B revenue.</p>

<h2>What This Means for Builders</h2>
<p>For developers and businesses using AI: the model landscape is shifting from "who has the best benchmark" to "who can deliver sustainable value." Public companies face different pressure than venture-backed ones. Expect more pricing transparency, clearer SLAs, and slower feature rollouts in exchange for stability.</p>

<p>Build With Abdallah helps businesses navigate AI tooling, build automation, and integrate models that actually deliver ROI.</p>';

$excerpt = 'OpenAI just filed for a $1 trillion IPO with Goldman Sachs and Morgan Stanley. Meanwhile Anthropic posted its first profit. Here is what the AI industry shift means for developers and businesses.';

Capsule::table('posts')->insert([
    'category_id' => 6,
    'user_id' => 1,
    'title' => 'OpenAI Files for $1 Trillion IPO — What It Means for AI Builders',
    'slug' => 'openai-ipo-2026',
    'excerpt' => $excerpt,
    'body' => $body,
    'cover_image' => 'images/tutorials/openai-ipo-2026.png',
    'status' => 'published',
    'featured' => 0,
    'published_at' => '2026-05-29 09:00:00',
    'meta_title' => 'OpenAI IPO 2026: What the $1T Filing Means for AI Builders',
    'meta_description' => 'OpenAI filed for a $1 trillion IPO. Here is what the numbers mean and how the shift to public markets affects AI builders and businesses.',
    'created_at' => now(),
    'updated_at' => now(),
]);

echo "Post inserted successfully!\n";

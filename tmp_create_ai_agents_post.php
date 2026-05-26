<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;

$body = file_get_contents(__DIR__ . '/tmp_ai_agents_workflow_post.md');
$user = User::where('email', 'admin@buildwithabdallah.com')->firstOrFail();
$category = Category::updateOrCreate(
    ['slug' => 'ai-agents'],
    ['name' => 'AI Agents', 'type' => 'post', 'description' => 'AI agent news, workflows, and practical implementation notes.']
);
$tagNames = ['AI', 'Agents', 'Workflow', 'Claude Code', 'Codex', 'OpenClaw'];
$tagIds = [];
foreach ($tagNames as $name) {
    $tag = Tag::updateOrCreate(['slug' => Str::slug($name)], ['name' => $name, 'slug' => Str::slug($name)]);
    $tagIds[] = $tag->id;
}
$title = 'The AI agent race is shifting from best model to best workflow';
$slug = 'ai-agent-race-best-model-vs-workflow';
$post = Post::updateOrCreate(
    ['slug' => $slug],
    [
        'user_id' => $user->id,
        'category_id' => $category->id,
        'title' => $title,
        'excerpt' => 'Google, Anthropic, OpenAI, and OpenClaw are all signaling the same thing: the AI agent race is shifting from best model to best workflow.',
        'body' => $body,
        'status' => 'published',
        'featured' => true,
        'published_at' => now(),
        'meta_title' => $title,
        'meta_description' => 'Why the AI agent race is moving from best model to best workflow, with signals from Google, Anthropic, OpenAI, and OpenClaw.',
    ]
);
$post->tags()->sync($tagIds);
echo $post->slug, PHP_EOL;

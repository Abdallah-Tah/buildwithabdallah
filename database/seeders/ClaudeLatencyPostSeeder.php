<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClaudeLatencyPostSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'admin@buildwithabdallah.com')->firstOrFail();
        $category = Category::updateOrCreate(
            ['slug' => 'ai-agents'],
            ['name' => 'AI Agents', 'type' => 'post', 'description' => 'AI agent news, workflows, and practical implementation notes.']
        );

        $tagData = [
            ['name' => 'AI', 'slug' => 'ai'],
            ['name' => 'Claude', 'slug' => 'claude'],
            ['name' => 'Agents', 'slug' => 'agents'],
            ['name' => 'Latency', 'slug' => 'latency'],
            ['name' => 'Workflow', 'slug' => 'workflow'],
            ['name' => 'Prompt Engineering', 'slug' => 'prompt-engineering'],
        ];
        $tagIds = [];
        foreach ($tagData as $t) {
            $tag = Tag::updateOrCreate(['slug' => $t['slug']], ['name' => $t['name'], 'slug' => $t['slug']]);
            $tagIds[] = $tag->id;
        }

        $body = <<<'BODY'
# 5 prompts that will make your Claude agent faster today

If your Claude agent feels slow, the model usually isn't the real problem. The workflow is.

Developers using Claude Code, Claude API, or any agentic setup often hit the same wall: the agent takes too long, reasons too much, or loops through unnecessary steps. The instinct is to blame the model. But most latency comes from how you orchestrate the agent — not which model you pick.

Here are 5 prompts you can use right now to make your Claude agent meaningfully faster.

## 1. Optimize every step for latency

> "Optimize every step for latency: parallelize tasks, cache repeated calls, minimize token usage, and avoid unnecessary reasoning."

This single instruction changes how Claude allocates effort. Instead of reasoning through everything sequentially, it looks for opportunities to batch, cache, and skip redundant analysis.

In practice: if your agent makes 4 API calls that could run in parallel, this prompt makes it realize that. If it's re-reading the same context on every turn, it starts caching the key facts instead.

## 2. Act with decisive execution

> "Act with decisive execution: return concise outputs, skip explanations unless requested, and prioritize fastest valid completion."

Claude defaults to thorough explanations. That's great for learning, terrible for throughput. This prompt tells it to stop explaining and start shipping.

The result: shorter responses, fewer tangent explanations, and faster turn-around per tool call. If you're running a CI pipeline or an agent loop, this alone can cut 30-40% off total execution time.

## 3. Batch API and tool calls

> "Batch API and tool calls whenever possible, and prefetch likely next actions before they are explicitly needed."

Most agent frameworks call one tool at a time. But Claude can plan ahead. This prompt encourages it to group related calls and anticipate what comes next, so you're not waiting on sequential round-trips that could have been parallel.

Think of it like pipelining in a CPU: while one instruction executes, the next one is already staged.

## 4. Escalate only when needed

> "Use lightweight models and tools for simple subtasks, then escalate only when complexity or confidence actually requires it."

Not every step needs a frontier model. File reads, format conversions, simple lookups — these can run on smaller, faster models. Save the heavy reasoning for the steps that actually need it.

If you're using OpenClaw or any multi-model agent framework, this is the key pattern: route tasks to the smallest model that can handle them, and only call the big model when the task genuinely demands it.

## 5. Favor deterministic workflows over exploratory ones

> "Continuously monitor bottlenecks, reduce context size dynamically, and favor deterministic workflows over exploratory ones."

Exploratory agents are cool for demos. In production, you want determinism. This prompt pushes Claude toward fixed pipelines where the steps are predictable, context is trimmed aggressively, and the agent doesn't waste turns "figuring out what to do."

The payoff: your agent becomes faster over time as it learns which context matters and which it can drop.

## The real lesson

A lot of people think they need a better model. What they actually need is better orchestration.

The prompts above work because they constrain the agent's behavior in productive ways. Less reasoning overhead. Fewer unnecessary steps. More parallelism. Smarter escalation. Deterministic flow.

If you're building agents — whether with Claude Code, OpenClaw, or your own orchestration layer — the fastest path to speed isn't upgrading your model. It's upgrading your workflow.

---

*Follow [Build With Abdallah](https://buildwithabdallah.com) for practical AI workflow tips that save real time.*
BODY;

        $post = Post::updateOrCreate(
            ['slug' => '5-prompts-faster-claude-agent'],
            [
                'user_id' => $user->id,
                'category_id' => $category->id,
                'title' => '5 prompts that will make your Claude agent faster today',
                'excerpt' => 'If your Claude agent feels slow, the model usually isn\'t the real problem. The workflow is. Here are 5 prompts you can use right now to make it meaningfully faster.',
                'body' => $body,
                'status' => 'published',
                'featured' => false,
                'published_at' => now(),
                'meta_title' => '5 prompts that will make your Claude agent faster today',
                'meta_description' => '5 practical prompts to speed up your Claude agent — latency optimization, deterministic workflows, batched API calls, and smarter model escalation.',
            ]
        );
        $post->tags()->sync($tagIds);
        $this->command->info("Post created: {$post->slug} (ID: {$post->id})");
    }
}

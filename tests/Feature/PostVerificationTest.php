<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\SocialPost;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class PostVerificationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        config(['app.key' => 'base64:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=']);
    }

    public function test_post_hash_matches_smkit_and_reading_time_excludes_code(): void
    {
        $post = Post::query()->create(['title' => 'Fixture', 'slug' => 'fixture', 'body' => str_repeat('word ', 221)."\n```python\n".str_repeat('code ', 500)."\n```"]);

        $this->assertSame('b72b4b80c657d336dad827363248ed807a2b307a82833bac9ee071f47a09b475', $post->content_hash);
        $this->assertSame(2, $post->reading_time_minutes);
    }

    public function test_article_exposes_revision_reading_time_and_visible_correction(): void
    {
        $this->withoutVite();
        $post = Post::query()->create(['title' => 'Verified article', 'slug' => 'verified-article', 'body' => str_repeat('word ', 30), 'excerpt' => 'Summary', 'status' => 'published', 'published_at' => now(), 'newsletter_sent_at' => now()]);
        $post->corrections()->create(['reason' => 'Corrected the release date after checking the primary source.', 'previous_content_hash' => str_repeat('a', 64), 'corrected_content_hash' => $post->content_hash, 'corrected_at' => now()]);

        $this->get('/tutorials/verified-article')->assertOk()
            ->assertSee('<meta name="smkit-content-hash" content="'.$post->content_hash.'">', false)
            ->assertSee('1 min read')->assertSee('Corrections')->assertSee('Corrected the release date');
    }

    public function test_social_revision_is_unique_per_platform(): void
    {
        $post = Post::query()->create(['title' => 'Article', 'slug' => 'article', 'body' => 'Body']);
        $attributes = ['post_id' => $post->id, 'platform' => 'linkedin', 'content_hash' => $post->content_hash, 'live_verified_at' => now()];
        SocialPost::query()->create($attributes);

        $this->expectException(QueryException::class);
        SocialPost::query()->create($attributes);
    }

    public function test_published_article_edit_requires_and_records_a_correction(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user, ['posts:update']);
        $post = Post::factory()->create(['status' => 'published', 'published_at' => now(), 'newsletter_sent_at' => now()]);

        $this->patchJson('/api/v1/posts/'.$post->id, ['body' => 'Corrected body'])->assertUnprocessable();
        $this->patchJson('/api/v1/posts/'.$post->id, [
            'body' => 'Corrected body',
            'correction_reason' => 'Corrected the release date using the primary source.',
        ])->assertOk();

        $this->assertDatabaseHas('post_corrections', ['post_id' => $post->id, 'reason' => 'Corrected the release date using the primary source.']);
    }

    public function test_social_creation_requires_live_verified_current_revision_and_retries_are_idempotent(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user, ['social-posts:create']);
        $post = Post::factory()->create();
        $payload = ['post_id' => $post->id, 'platform' => 'linkedin', 'caption' => 'Summary'];

        $this->postJson('/api/v1/social-posts', $payload)->assertUnprocessable();
        $verified = [...$payload, 'content_hash' => $post->content_hash, 'live_verified_at' => now()->toIso8601String()];
        $this->postJson('/api/v1/social-posts', $verified)->assertCreated();
        $this->postJson('/api/v1/social-posts', $verified)->assertOk();
        $this->assertDatabaseCount('social_posts', 1);
    }

    public function test_publish_requires_approval_for_the_exact_revision(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user, ['posts:publish']);
        $post = Post::factory()->create(['status' => 'draft']);

        $this->postJson('/api/v1/posts/'.$post->id.'/publish', ['content_hash' => $post->content_hash])
            ->assertUnprocessable();

        $post->update([
            'editorial_approved_hash' => $post->content_hash,
            'editorial_approved_at' => now(),
            'editorial_approval_record_hash' => str_repeat('c', 64),
        ]);
        $this->postJson('/api/v1/posts/'.$post->id.'/publish', ['content_hash' => $post->content_hash])
            ->assertOk();

        $post->update(['body' => 'A new revision that must be approved again.']);
        $this->assertNull($post->fresh()->editorial_approved_at);
    }

    public function test_scoped_editorial_approval_records_the_gate_artifact(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user, ['posts:approve']);
        $post = Post::factory()->create(['status' => 'draft']);
        $recordHash = str_repeat('b', 64);

        $this->postJson('/api/v1/posts/'.$post->id.'/approve', [
            'content_hash' => $post->content_hash,
            'editorial_record_hash' => $recordHash,
        ])->assertOk()->assertJsonPath('data.editorial_approval_record_hash', $recordHash);

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'editorial_approved_hash' => $post->content_hash,
            'editorial_approval_record_hash' => $recordHash,
        ]);
    }
}

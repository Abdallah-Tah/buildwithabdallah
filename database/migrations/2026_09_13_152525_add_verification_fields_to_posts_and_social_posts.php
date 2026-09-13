<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->char('content_hash', 64)->nullable()->index();
            $table->unsignedSmallInteger('reading_time_minutes')->nullable();
            $table->char('editorial_approved_hash', 64)->nullable()->index();
            $table->timestamp('editorial_approved_at')->nullable();
        });
        Schema::table('social_posts', function (Blueprint $table) {
            $table->char('content_hash', 64)->nullable();
            $table->timestamp('live_verified_at')->nullable();
            $table->unique(['post_id', 'platform', 'content_hash'], 'social_post_revision_unique');
        });

        DB::table('posts')->orderBy('id')->each(function (object $post): void {
            $flags = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR;
            $hash = hash('sha256', '['.json_encode((string) $post->title, $flags).', '.json_encode((string) $post->body, $flags).']');
            $body = (string) $post->body;
            $rendered = str_contains($body, '<pre') || str_contains($body, '<h2') || str_contains($body, '<h3')
                ? $body
                : Str::markdown($body, ['html_input' => 'strip', 'allow_unsafe_links' => false]);
            $withoutCode = preg_replace('/<(pre|code)\b[^>]*>.*?<\/\1>/is', ' ', $rendered) ?? $rendered;
            DB::table('posts')->where('id', $post->id)->update([
                'content_hash' => $hash,
                'reading_time_minutes' => max(1, (int) ceil(str_word_count(strip_tags($withoutCode)) / 220)),
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('social_posts', function (Blueprint $table) {
            $table->dropUnique('social_post_revision_unique');
            $table->dropColumn(['content_hash', 'live_verified_at']);
        });
        Schema::table('posts', fn (Blueprint $table) => $table->dropColumn([
            'content_hash',
            'reading_time_minutes',
            'editorial_approved_hash',
            'editorial_approved_at',
        ]));
    }
};

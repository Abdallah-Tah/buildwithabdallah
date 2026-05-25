<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('videos')
            ->where(function ($query): void {
                $query
                    ->where('youtube_embed_url', 'like', '%dQw4w9WgXcQ%')
                    ->orWhere('slug', 'build-api-first-mvp');
            })
            ->update([
                'status' => 'draft',
                'featured' => false,
                'published_at' => null,
                'updated_at' => now(),
            ]);
    }

    public function down(): void
    {
        //
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('newsletter_subscribers', function (Blueprint $table): void {
            $table->string('unsubscribe_token', 64)->nullable()->unique()->after('source');
            $table->timestamp('unsubscribed_at')->nullable()->after('subscribed_at');
        });

        Schema::table('posts', function (Blueprint $table): void {
            // Set when the new-post newsletter broadcast has been dispatched,
            // so a post is never emailed to the list twice.
            $table->timestamp('newsletter_sent_at')->nullable()->after('published_at');
        });
    }

    public function down(): void
    {
        Schema::table('newsletter_subscribers', function (Blueprint $table): void {
            $table->dropColumn(['unsubscribe_token', 'unsubscribed_at']);
        });

        Schema::table('posts', function (Blueprint $table): void {
            $table->dropColumn('newsletter_sent_at');
        });
    }
};

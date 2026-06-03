<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('social_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('provider')->unique();        // linkedin, facebook
            $table->string('provider_user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->text('access_token');                // stored encrypted (model cast)
            $table->text('refresh_token')->nullable();   // stored encrypted (model cast)
            $table->string('token_type')->nullable();
            $table->string('scope')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_accounts');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->string('organization')->nullable()->after('name');
            $table->string('phone', 50)->nullable()->after('email');
            $table->string('project_type')->nullable()->after('phone');
            $table->string('timeline', 100)->nullable()->after('project_type');
            $table->string('subject')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->dropColumn(['organization', 'phone', 'project_type', 'timeline']);
            $table->string('subject')->nullable(false)->change();
        });
    }
};

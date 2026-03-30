<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->nullable()->after('id')->constrained()->onDelete('set null');
            $table->string('status')->default('active')->after('password');
            $table->string('profile_photo_path', 2048)->nullable()->after('status');
            $table->timestamp('last_login_at')->nullable()->after('profile_photo_path');
            $table->softDeletes()->after('updated_at');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('role_id');
            $table->dropColumn(['status', 'profile_photo_path', 'last_login_at', 'deleted_at']);
        });
    }
};

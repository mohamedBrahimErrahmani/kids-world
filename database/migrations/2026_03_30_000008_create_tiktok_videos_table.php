<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tiktok_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('tiktok_url');
            $table->string('thumbnail_path')->nullable();
            $table->bigInteger('views_count')->default(0);
            $table->integer('clicks_count')->default(0);
            $table->float('engagement_rate', 8, 2)->default(0);
            $table->timestamp('posted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tiktok_videos');
    }
};

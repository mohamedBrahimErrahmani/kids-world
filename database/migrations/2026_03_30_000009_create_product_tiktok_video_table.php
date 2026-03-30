<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_tiktok_video', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('tiktok_video_id')->constrained()->onDelete('cascade');
            $table->primary(['product_id', 'tiktok_video_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_tiktok_video');
    }
};

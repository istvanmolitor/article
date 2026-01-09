<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('article_article_group', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->foreignId('article_id')->constrained('articles')->cascadeOnDelete();
            $blueprint->foreignId('article_group_id')->constrained('article_groups')->cascadeOnDelete();
            $blueprint->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('article_article_group');
    }
};

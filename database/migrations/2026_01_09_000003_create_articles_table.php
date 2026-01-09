<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->string('title');
            $blueprint->string('lead')->nullable();
            $blueprint->string('image')->nullable();
            $blueprint->string('slug')->unique();
            $blueprint->longText('content')->nullable();
            $blueprint->foreignId('author_id')->nullable()->constrained('authors')->nullOnDelete();
            $blueprint->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

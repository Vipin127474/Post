<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_comment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->on('users')->cascadeOnDelete();
            $table->foreignId('blog_id')->on('blogs')->cascadeOnDelete();
            $table->timestamps();

        // Ensure a user can only like a post once
        $table->unique(['user_id', 'blog_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_comment');
    }
};

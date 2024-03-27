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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id')->nullable;
            $table->unsignedBigInteger('user_id')->nullable;
            $table->index('post_id', 'favorite_post_idx');
            $table->index('user_id', 'favorite_user_idx');
            $table->foreign('post_id', 'favorite_post_fk')->on('posts')->references('id');
            $table->foreign('user_id', 'favorite_user_fk')->on('users')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};

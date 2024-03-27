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
        Schema::create('steps', function (Blueprint $table) {
            $table->id();
            $table->string('text_st');
            $table->string('img_st');
            $table->integer('order')->unsigned()->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('post_id')->nullable;
            $table->index('post_id', 'step_category_idx');
            $table->foreign('post_id', 'step_post_fk')->on('posts')->references('id');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('steps');
    }
};

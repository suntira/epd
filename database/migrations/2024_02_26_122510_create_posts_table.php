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
         Schema::create('posts', function (Blueprint $table) {
             $table->id();
             $table->string('name_post');
             $table->string('img_title');
             $table->timestamps();
             $table->unsignedBigInteger('status_id')->nullable;
             $table->index('status_id', 'post_status_idx');
             $table->foreign('status_id', 'post_status_fk')->on('statuses')->references('id');

             $table->unsignedBigInteger('user_id')->nullable;
             $table->index('user_id', 'post_user_idx');
             $table->foreign('user_id', 'post_user_fk')->on('users')->references('id');

             $table->unsignedBigInteger('type_id')->nullable;
             $table->index('type_id', 'post_type_idx');
             $table->foreign('type_id', 'post_type_fk')->on('types')->references('id');

             $table->unsignedBigInteger('subject_id')->nullable;
             $table->index('subject_id', 'post_subject_idx');
             $table->foreign('subject_id', 'post_subject_fk')->on('subjects')->references('id');
             
             $table->unsignedBigInteger('levl_id')->nullable;
             $table->index('levl_id', 'post_levl_idx');
             $table->foreign('levl_id', 'post_levl_fk')->on('levls')->references('id');
      
         });
     }
 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

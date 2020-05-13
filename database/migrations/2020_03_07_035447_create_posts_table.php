<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->json('slug');
            $table->unsignedBigInteger('image_id')
                ->nullable();
            $table->unsignedBigInteger('user_id');
            $table->json('seo_keywords')
                ->nullable();
            $table->json('seo_description')
                ->nullable();
            $table->json('title');
            $table->json('description');
            $table->json('text');
            $table->float('rating')
                ->default(0);
            $table->boolean('is_enabled')
                ->default(false);
            $table->timestamp('published_at')
                ->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

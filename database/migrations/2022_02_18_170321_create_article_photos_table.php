<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('articleId')->nullable()->references('id')->on('categories')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("thumbnailUrl");
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
        Schema::dropIfExists('article_photos');
    }
}

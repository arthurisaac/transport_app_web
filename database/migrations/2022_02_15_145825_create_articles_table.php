<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string("label")->nullable();
            $table->text("description")->nullable();
            $table->string("price")->default(0);
            $table->boolean("stock")->default(true)->nullable();
            $table->string("location")->nullable();
            $table->string("coordinates")->nullable();
            $table->integer("views")->default(0)->nullable();
            $table->integer("shares")->default(0)->nullable();
            $table->string("measure");
            $table->string("thumbnailUrl")->nullable();
            $table->foreignId('categoryId')->nullable()->references('id')->on('categories')
                ->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('articles');
    }
}

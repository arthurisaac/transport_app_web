<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('articleId')->nullable()->references('id')->on('articles')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("userAddressMail")->nullable();
            $table->string("userPhoneNumber")->nullable();
            $table->string("quantity")->nullable();
            $table->double("amount")->default(0)->nullable();
            $table->string("deliveryAddress")->nullable();
            $table->string("methodOfPayment")->nullable();
            $table->string("confirmationMessage")->nullable();
            $table->boolean("adminRead")->default(false)->nullable();
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
        Schema::dropIfExists('orders');
    }
}

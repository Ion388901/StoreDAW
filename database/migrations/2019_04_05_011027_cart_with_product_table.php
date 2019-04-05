<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CartWithProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_with_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cart_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->timestamps();
            $table->foreign('cart_id')
                ->references('id')
                ->on('cart')
                ->onDelete('cascade');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_with_product');
    }
}

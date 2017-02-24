<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('user_id')->default(0);
            $table->string('session_id')->default('');
            
        });


        Schema::create('cart_products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('cart_id')->unsigned()->index();
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');

            $table->integer('product_id')->unsigned()->index();;
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->integer('quantity')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
        Schema::dropIfExists('cart_products');
        
    }
}

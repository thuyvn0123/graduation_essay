<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('p_id');
            $table->string('p_name');
            $table->integer('tp_id')->unsigned();
            $table->foreign('tp_id')->references('tp_id')->on('type_products')->onDelete('cascade');
            $table->integer('rp_id')->unsigned();
            $table->foreign('rp_id')->references('rp_id')->on('room_space')->onDelete('cascade');
            $table->string('p_img');
            $table->integer('p_quantity');
            $table->integer('p_price');
            $table->string('p_size')->nullable();
            $table->string('p_desc')->nullable();
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
        Schema::dropIfExists('products');
    }
}

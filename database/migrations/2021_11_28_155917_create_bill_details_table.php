<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->increments('bd_id');
            $table->string('bd_name');
            $table->integer('p_id')->unsigned();
            $table->string('b_id');
            $table->foreign('b_id')->references('b_id')->on('bills')->onDelete('cascade');
            $table->string('bd_img');
            $table->integer('bd_quantity');
            $table->integer('bd_price');
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
        Schema::dropIfExists('bill_details');
    }
}

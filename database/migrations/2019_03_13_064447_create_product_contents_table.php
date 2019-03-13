<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_holding_id');
            $table->string('name');
            $table->integer('value');
            $table->timestamps();

            $table->foreign('product_holding_id')->references('id')->on('product_holdings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_contents');
    }
}

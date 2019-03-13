<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactionals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('product_content_id');
            $table->unsignedInteger('branch_id');
            $table->string('source_customer');
            $table->string('position');
            $table->string('customer_name');
            $table->string('sales_limit');
            $table->string('transportation_type');
            $table->string('ksm_limit');
            $table->string('follow_up_by');
            $table->integer('value');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_content_id')->references('id')->on('product_contents');
            $table->foreign('branch_id')->references('id')->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactionals');
    }
}

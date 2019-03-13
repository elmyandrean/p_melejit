<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetailCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retail_credits', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('product_content_id');
            $table->unsignedInteger('branch_id');
            $table->string('source_customer');
            $table->string('position');
            $table->string('customer_name');
            $table->string('account_number');
            $table->string('nominal_credit');
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
        Schema::dropIfExists('retail_credits');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducedetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producedetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tea_no');
            $table->integer('user_id');
            $table->string('receipt_no');
            $table->integer('gross_weight');
            $table->integer('net_weight');
            $table->integer('total_as_at_day');
            $table->date('date_offered');
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
        Schema::dropIfExists('producedetails');
    }
}

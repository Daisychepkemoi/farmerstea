<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tea__details', function (Blueprint $table) {
             $table->increments('id');
            $table->integer('tea_no');
            // $table->integer('user_id');
            $table->string('receipt_no');
            $table->integer('gross_weight')->default('1');
            $table->integer('net_weight')->default('0');
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
        Schema::dropIfExists('tea__details');
    }
}

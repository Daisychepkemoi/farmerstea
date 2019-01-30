<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeasTable extends Migration
{
    /**
    
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            
            $table->integer('tea_no')->nullable();
            $table->float('no_acres');
            $table->float('expected_produce');
            $table->float('no_of_fert');
            $table->float('bonus');
            $table->date('date_verified')->default(now());
            $table->string('verified_by')->nullable();
            $table->string('location');
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
        Schema::dropIfExists('teas');
    }
}

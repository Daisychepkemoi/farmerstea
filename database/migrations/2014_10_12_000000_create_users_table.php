<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('email')->unique();
            $table->integer('national_id')->unique();
            $table->string('phone_no')->unique();
            $table->string('password');
            $table->boolean('verified')->default(0);
            $table->string('verifiedadmin')->default('notverified');
            $table->string('role')->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('created_by')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

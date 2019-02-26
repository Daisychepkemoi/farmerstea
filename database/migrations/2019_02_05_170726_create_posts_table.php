<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
           
           $table->text('body');
           $table->text('title');
        $table->binary('image')->nullable();
        $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return voimage
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
# database/migrations/CreateBooksTable.php


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->Bigincrements('id');
            $table->string('descr_comment');
            $table->Biginteger('author_comment')->unsigned()->nullable();
            $table->foreign('author_comment')->references('author_id')->on('author');
            $table->Biginteger('post_ref')->unsigned();
            $table->foreign('post_ref')->references('id')->on('posts');
            $table->timestamp('data_ora_comment');
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
        Schema::dropIfExists('comments');
    }
}
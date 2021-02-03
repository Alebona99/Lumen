<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAuthor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author', function (Blueprint $table) {
            $table->increments('author_id');
            $table->string('nome');
            $table->string('cognome');
            $table->string('email');
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
        Schema::dropIfExists('author');
    }
}






class CreateTablePost extends Migration
{
   public function up(){
    Schema::create('post', function (Blueprint $table){
        $table->increments('post_id');
        $table->string('descr_post');
        $table->integer('author_post')->unsigned();
        $table->foreign('author_post')->references('author_id')->on('author');
        $table->timestamp('data_ora_post');
        $table->timestamps();
    });

   }

   public function down(){
        Schema::dropIfExists('post');
   }

}







class CreateTableComment extends Migration
{
    public function up(){
        Schema::create('comment', function (Blueprint $table){
            $table->increments('comment_id');
            $table->string('descr_comment');
            $table->integer('author_comment')->unsigned();
            $table->foreign('author_comment')->references('author_id')->on('author');
            $table->integer('post_ref')->unsigned();
            $table->foreign('post_ref')->references('post_id')->on('post');
            $table->timestamp('data_ora_comment');
            $table->timestamps();
        });
        

    }

    public function down(){
        Schema::dropIfExists('post');
    }


}
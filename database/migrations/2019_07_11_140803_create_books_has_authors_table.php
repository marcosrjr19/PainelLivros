<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksHasAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_has_authors', function (Blueprint $table) {
            $table->integer('book_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->timestamps();

            
            $table->foreign('book_id')->references('id')->on('book');
            $table->foreign('author_id')->references('id')->on('author');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books_has_authors');
    }
}

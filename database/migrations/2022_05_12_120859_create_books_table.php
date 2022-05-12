<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_name');
            $table->string('book_author');
            $table->integer('book_price');
            $table->string('publishing_house');
            $table->string('book_language');
            $table->integer('book_quantity');
            $table->string('book_image');
            $table->string('book_translator');
            $table->string('book_series');
            $table->string('book_pages');
            $table->integer('publish_year');
            $table->string('book_annotation');
            $table->string('book_genre');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}

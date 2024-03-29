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
      $table->string('title');
      $table->date('published_date');
    //   $table->string('imgUrl');
      $table->string('isbn');
      $table->string('desc', 600);
      $table->double('price');

      $table->unsignedBigInteger('author_id');
      $table->foreign('author_id')->references('id')->on('authors');

      $table->unsignedBigInteger('genre_id');
      $table->foreign('genre_id')->references('id')->on('genres');

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
    Schema::dropIfExists('books');
  }
}

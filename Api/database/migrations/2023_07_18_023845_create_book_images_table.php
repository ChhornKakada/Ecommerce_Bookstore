<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookImagesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('book_images', function (Blueprint $table) {
      $table->id();
      $table->string('front');
      $table->string('back');
      $table->string('left');
      $table->string('inside');
      $table->unsignedBigInteger('book_id');
      $table->foreign('book_id')->references('id')->on('books');
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
    Schema::dropIfExists('book_images');
  }
}

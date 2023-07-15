<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockHistoriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('stock_histories', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('book_id');
      $table->foreign('book_id')->references('id')->on('books');
      $table->integer('qty');
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
    Schema::dropIfExists('stock_histories');
  }
}

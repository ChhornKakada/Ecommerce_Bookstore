<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('order_details', function (Blueprint $table) {
      $table->id();

      $table->unsignedBigInteger('order_id');
      $table->foreign('order_id')->references('id')->on('orders');

      $table->unsignedBigInteger('book_id');
      $table->foreign('book_id')->references('id')->on('books');

      $table->integer('qty');
      $table->double('total_price');
      // $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('order_details');
  }
}

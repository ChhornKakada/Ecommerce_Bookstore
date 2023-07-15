<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('payments', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('payment_mothod_id');
      $table->foreign('payment_mothod_id')->references('id')->on('payment_methods');
      $table->string('cardholder_name');
      $table->string('card_number');
      $table->string('email');
      $table->integer('month');
      $table->integer('year');
      $table->integer('cvv');
    //   $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('payments');
  }
}

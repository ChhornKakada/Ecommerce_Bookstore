<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('orders', function (Blueprint $table) {
      $table->id();

      $table->unsignedBigInteger('shipping_address_id');
      $table->foreign('shipping_address_id')->references('id')->on('shipping_addresses');

      $table->double('total_price');
      $table->double('price_after_discount');

      $table->unsignedBigInteger('customer_id');
      $table->foreign('customer_id')->references('id')->on('users');

      $table->unsignedBigInteger('shipping_company_id');
      $table->foreign('shipping_company_id')->references('id')->on('shipping_companies');

      $table->unsignedBigInteger('payment_id');
      $table->foreign('payment_id')->references('id')->on('payments');

      $table->unsignedBigInteger('promote_code_id');
      $table->foreign('promote_code_id')->references('id')->on('promote_codes');

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
    Schema::dropIfExists('orders');
  }
}

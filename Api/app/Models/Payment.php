<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  use HasFactory;

  public $timestamps = false;

  public function paymentMethod() {
    return $this->belongsTo(Payment_method::class);
  }

  public function order() {
    return $this->belongsTo(Order::class);
  }
}

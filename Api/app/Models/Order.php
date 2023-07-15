<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use HasFactory;

  public function shippingCompany() {
    return $this->belongsTo(Shipping_company::class);
  }

  public function promoteCode() {
    return $this->belongsTo(Promote_code::class);
  }

  public function shippingAddress() {
    return $this->hasOne(Shipping_address::class);
  }

  public function payment() {
    return $this->hasOne(Payment::class);
  }

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function orderDetails() {
    return $this->hasMany(Order_detail::class);
  }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
  use HasFactory;
  public $timestamps = false;

  protected $fillable = [
    'order_id',
    'book_id',
    'qty',
    'total_price'
  ];

  public function order() {
    return $this->belongsTo(Order::class);
  }

  public function book() {
    return $this->belongsTo(Book::class);
  }


}

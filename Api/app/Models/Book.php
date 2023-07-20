<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
  use HasFactory;

  public function author() {
    return $this->belongsTo(Author::class);
  }

  public function genre() {
    return $this->belongsTo(Genre::class);
  }

  public function stockHistories() {
    return $this->hasMany(Stock_history::class);
  }

  public function stock() {
    return $this->hasOne(Stock::class);
  }

  public function orderDetails() {
    return $this->hasMany(Order_detail::class);
  }

  public function bookImage() {
    return $this->hasOne(BookImage::class);
  }
}

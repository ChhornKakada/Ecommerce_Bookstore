<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping_address extends Model
{
  use HasFactory;
  public $timestamps = false;

  protected $fillable = [
    'firstname',
    'lastname',
    'address',
    'city',
    'country',
    'zip_code',
    'optional',
    'apartment'
  ];

  public function order() {
    return $this->belongsTo(Order::class);
  }
}

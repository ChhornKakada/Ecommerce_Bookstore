<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Book_image;
use App\Models\BookImage;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Book::factory()
      ->count(1024)
      // ->has(model::factory()->count(1), 'function in model')
      ->has(BookImage::factory()->count(1), 'bookImage')
      ->create();
  }
}

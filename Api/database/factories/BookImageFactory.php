<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookImageFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'book_id' => Book::factory(),
      'front' => $this->faker->imageUrl(400, 600, 'books', true),
      'back' => $this->faker->imageUrl(400, 600, 'books', true),
      'left' => $this->faker->imageUrl(400, 600, 'books', true),
      'inside' => $this->faker->imageUrl(400, 600, 'books', true),
    ];
  }
}

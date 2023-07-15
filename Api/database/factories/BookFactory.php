<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;
use App\Models\Genre;

class BookFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {

    $genreIds = Genre::pluck('id')->toArray();
    $authorIds = Author::pluck('id')->toArray();

    // echo ($genreIds)

    return [
      'title' => $this->faker->sentence(),

      'author_id' => $this->faker->randomElement($authorIds),
      'genre_id' => $this->faker->randomElement($genreIds),
      'imgUrl' => $this->faker->imageUrl(400, 600, 'books', true),
      'published_date' => $this->faker->dateTimeBetween('-40 years', 'now')->format('Y-m-d'),
      'isbn' => $this->faker->isbn13(),
      'desc' => $this->faker->paragraph(),
      'price' => $this->faker->randomFloat(2, 6, 25) // before dot, 6 - 25
    ];
  }
}

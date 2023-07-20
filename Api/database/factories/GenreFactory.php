<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GenreFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'type' => $this->faker->word,
      'imgUrl' => $this->faker->imageUrl(400, 600, 'genres', true),
      'desc' => $this->faker->sentence()
    ];
  }

  /**
   * Specify a specific genre.
   *
   * @param  string  $genre
   * @return \Illuminate\Database\Eloquent\Factories\Factory
   */

  public function specificGenre($type, $imgUrl, $desc)
  {
    return $this->state(function (array $attributes) use ($type, $imgUrl, $desc) {
      return [
        'type' => $type,
        'imgUrl' => $imgUrl,
        'desc' => $desc
      ];
    });
  }
}

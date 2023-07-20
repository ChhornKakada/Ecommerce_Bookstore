<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'type' => $this->faker->word
    ];
  }

  /**
   * Specify a specific genre.
   *
   * @param  string  $genre
   * @return \Illuminate\Database\Eloquent\Factories\Factory
   */

  public function specificGenre($type)
  {
    return $this->state(function (array $attributes) use ($type) {
      return [
        'type' => $type
      ];
    });
  }
}

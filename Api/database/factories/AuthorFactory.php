<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition() {

    return [
      'fullname' => $this->faker->name(),
      'dob' => $this->faker->dateTimeBetween('-60 years', '-20 years')->format('Y-m-d'),
      'tel' => $this->faker->phoneNumber(),
      'email' => $this->faker->email()
    ];
  }
}

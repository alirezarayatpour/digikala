<?php

namespace Database\Factories\Backend;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Backend\Application>
 */
class ApplicationFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   public function definition()
   {
      return [
         'image' => $this->faker->imageUrl,
         'link' => $this->faker->url,
         'status' => $this->faker->numberBetween(0, 1),
      ];
   }
}

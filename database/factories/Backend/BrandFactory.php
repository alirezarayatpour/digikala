<?php

namespace Database\Factories\Backend;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Backend\Brand>
 */
class BrandFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   public function definition()
   {
      return [
         'farsi_name' => $this->faker->title,
         'english_name' => $this->faker->title,
         'image' => $this->faker->imageUrl,
         'status' => $this->faker->numberBetween(0, 1),
      ];
   }
}

<?php

namespace Database\Factories\Backend;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Backend\Category>
 */
class CategoryFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   public function definition()
   {
      return [
         'category' => $this->faker->title,
         'parent_id' => $this->faker->numberBetween(0, 10),
         'child_id' => $this->faker->numberBetween(0, 10),
         'image' => $this->faker->imageUrl,
         'slug' => $this->faker->title,
         'status' => $this->faker->numberBetween(0, 1),
      ];
   }
}

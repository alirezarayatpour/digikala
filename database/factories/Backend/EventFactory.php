<?php

namespace Database\Factories\Backend;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Backend\Event>
 */
class EventFactory extends Factory
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
         'text' => $this->faker->title,
         'status' => $this->faker->numberBetween(0, 1),
      ];
   }
}

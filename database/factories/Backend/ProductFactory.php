<?php

namespace Database\Factories\Backend;

use App\Models\Backend\Brand;
use App\Models\Backend\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Backend\Product>
 */
class ProductFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string => $this->faker->, mixed>
    */
   public function definition()
   {
      return [
         'cover' => $this->faker->imageUrl,
         'brand' => Brand::factory(),
         'farsi_title' => $this->faker->title,
         'english_title' => $this->faker->title,
         'storage' => $this->faker->numberBetween(10, 20),
         'price' => $this->faker->randomNumber(6, false),
         'sale' => $this->faker->numberBetween(5, 50),
         'category_id' => Category::factory(),
         'intro' => $this->faker->text,
         'specific' => $this->faker->text,
         'position' => $this->faker->numberBetween(1, 3),
         'slug' => $this->faker->title,
         'status' => $this->faker->numberBetween(0, 1),
      ];
   }
}

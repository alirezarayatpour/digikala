<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Backend\Application;
use App\Models\Backend\Brand;
use App\Models\Backend\Category;
use App\Models\Backend\Event;
use App\Models\Backend\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   /**
    * Seed the application's database.
    *
    * @return void
    */
   public function run()
   {
      // \App\Models\User::factory(10)->create();
      Category::factory(10)->create();
      Brand::factory(10)->create();
      Product::factory(20)->create();
      Event::factory(5)->create();
      Application::factory(5)->create();

      // \App\Models\User::factory()->create([
      //     'name' => 'Test User',
      //     'email' => 'test@example.com',
      // ]);
   }
}

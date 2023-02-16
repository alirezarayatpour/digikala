<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('carts', function (Blueprint $table) {
         $table->id();
         $table->foreignId('user_id')->constrained('id')->on('users')->onDelete('cascade');
         $table->foreignId('product_id')->constrained('id')->on('products')->onDelete('cascade');
         $table->bigInteger('price');
         $table->integer('count')->default(1);
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('carts');
   }
};

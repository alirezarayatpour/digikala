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
      Schema::create('sellers', function (Blueprint $table) {
         $table->id();
         $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
         $table->foreignId('vendor_id')->constrained('users')->onDelete('cascade');
         $table->integer('storage');
         $table->string('price');
         $table->integer('sale')->nullable();
         $table->tinyInteger('status')->default(0);
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
      Schema::dropIfExists('sellers');
   }
};

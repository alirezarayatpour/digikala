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
      Schema::create('product_comments', function (Blueprint $table) {
         $table->id();
         $table->integer('rate');
         $table->string('title')->nullable();
         $table->text('positive_point')->nullable();
         $table->text('negative_point')->nullable();
         $table->text('body');
         $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
         $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
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
      Schema::dropIfExists('product_comments');
   }
};

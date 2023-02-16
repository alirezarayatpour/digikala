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
      Schema::create('products', function (Blueprint $table) {
         $table->id();
         $table->string('cover');
         $table->string('brand');
         $table->text('farsi_title');
         $table->text('english_title')->nullable();
         $table->text('property')->nullable();
         $table->integer('storage');
         $table->string('price');
         $table->integer('sale')->nullable();
         $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
         $table->text('intro');
         $table->longText('expert')->nullable();
         $table->longText('specific');
         $table->string('position');
         $table->string('slug');
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
      Schema::dropIfExists('products');
   }
};

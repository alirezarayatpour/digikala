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
      Schema::create('users', function (Blueprint $table) {
         $table->id();
         $table->string('name');
         $table->tinyInteger('role')->default(0);
         $table->string('email')->unique();
         $table->timestamp('email_verified_at')->nullable();
         $table->string('password');
         $table->string('shaba')->nullable();
         $table->string('birthday')->nullable();
         $table->string('job')->nullable();
         $table->text('address')->nullable();
         $table->string('code_post')->nullable();
         $table->integer('national_code')->nullable();
         $table->string('phone');
         $table->rememberToken();
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
      Schema::dropIfExists('users');
   }
};

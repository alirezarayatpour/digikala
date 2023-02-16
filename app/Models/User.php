<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Favorite;
use App\Models\Backend\Cart;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   use HasApiTokens, HasFactory, Notifiable;

   /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
      'vendor_id',
      'name',
      'email',
      'password',
      'national_code',
      'phone',
      'shaba',
      'birthday',
      'job',
      'address',
      'code_post',
      'role',
   ];

   /**
    * The attributes that should be hidden for serialization.
    *
    * @var array<int, string>
    */
   protected $hidden = [
      'password',
      'remember_token',
   ];

   /**
    * The attributes that should be cast.
    *
    * @var array<string, string>
    */
   protected $casts = [
      'email_verified_at' => 'datetime',
   ];

   public function cart()
   {
      return $this->hasMany(Cart::class, 'user_id', 'id');
   }

   public function favorite()
   {
      return $this->hasMany(Favorite::class, 'user_id', 'id');
   }

   public function vendor()
   {
      return $this->hasOne(Vendor::class, 'user_id', 'id');
   }
}

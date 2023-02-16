<?php

namespace App\Models\Backend;

use App\Models\User;
use App\Models\Seller;
use App\Models\Backend\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
   use HasFactory;

   protected $fillable = [
      'product_id',
      'price',
      'count',
   ];

   public function product()
   {
      return $this->hasOne(Product::class, 'id', 'product_id');
   }

   public function user()
   {
      return $this->hasOne(User::class, 'id', 'user_id');
   }

   public function seller()
   {
      return $this->hasOne(Seller::class, 'id', 'product_id');
   }
}

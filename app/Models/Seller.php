<?php

namespace App\Models;

use App\Models\Backend\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
   use HasFactory;

   protected $fillable = [
      'storage',
      'price',
      'sale',
      'product_id',
      'vendor_id',
   ];

   public function user()
   {
      return $this->belongsTo(User::class, 'vendor_id', 'id');
   }

   public function product()
   {
      return $this->belongsTo(Product::class, 'product_id', 'id');
   }
}

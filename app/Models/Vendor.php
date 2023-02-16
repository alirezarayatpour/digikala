<?php

namespace App\Models;

use App\Models\Backend\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendor extends Model
{
   use HasFactory;

   protected $fillable = [
      'category_id',
      'user_id',
      'city',
      'bank',
      'shop',
      'record',
   ];

   public function user()
   {
      return $this->belongsTo(User::class);
   }

   public function category()
   {
      return $this->belongsTo(Category::class);
   }
}


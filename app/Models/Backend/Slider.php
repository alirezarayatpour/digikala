<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
   use HasFactory;

   protected $fillable = [
      'image',
      'category_id',
      'position',
   ];

   public function category()
   {
      return $this->belongsTo(Category::class);
   }
}

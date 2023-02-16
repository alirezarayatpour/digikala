<?php

namespace App\Models\Backend;

use App\Models\Backend\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class homeBanner extends Model
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

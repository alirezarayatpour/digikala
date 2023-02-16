<?php

namespace App\Models\Backend;

use App\Models\User;
use App\Models\Backend\ProductComment;
use App\Models\Seller;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
   use HasFactory, Sluggable;

   protected $fillable = [
      'cover',
      'brand',
      'farsi_title',
      'english_title',
      'property',
      'storage',
      'price',
      'sale',
      'category_id',
      'intro',
      'expert',
      'specific',
      'position',
      'slug',
   ];

   public function images()
   {
      return $this->hasMany(Image::class);
   }

   public function category()
   {
      return $this->belongsTo(Category::class);
   }

   public function comment()
   {
      return $this->hasMany(ProductComment::class);
   }

   public function question()
   {
      return $this->hasMany(ProductQuestion::class);
   }

   public function user()
   {
      return $this->belongsTo(User::class, 'vendor_id', 'id');
   }

   public function sluggable(): array
   {
      return [
         'slug' => [
            'source' => 'farsi_title',
         ]
      ];
   }

   public function getRouteKeyName()
   {
      return 'slug';
   }
}

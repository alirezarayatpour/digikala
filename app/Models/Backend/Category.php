<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
   use HasFactory, Sluggable;

   protected $fillable = [
      'category',
      'parent_id',
      'child_id',
      'image',
      'slug',
   ];

   public function sluggable(): array
   {
      return [
         'slug' => [
            'source' => 'category',
         ]
      ];
   }

   public function getRouteKeyName()
   {
      return 'slug';
   }
}

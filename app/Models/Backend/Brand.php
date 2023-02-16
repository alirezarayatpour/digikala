<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
   use HasFactory;

   protected $fillable = [
      'farsi_name',
      'english_name',
      'image',
   ];
}

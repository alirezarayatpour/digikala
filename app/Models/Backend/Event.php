<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
   use HasFactory;

   protected $fillable = [
      'image',
      'link',
      'text',
   ];
}

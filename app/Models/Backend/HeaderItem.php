<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderItem extends Model
{
   use HasFactory;

   protected $fillable = [
      'icon',
      'item',
      'link',
   ];
}

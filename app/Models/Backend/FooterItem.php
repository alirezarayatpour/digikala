<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterItem extends Model
{
   use HasFactory;

   protected $fillable = [
      'item',
      'link',
      'position',
   ];
}

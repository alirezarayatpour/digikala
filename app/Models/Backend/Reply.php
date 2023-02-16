<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reply extends Model
{
   use HasFactory;

   protected $fillable = [
      'user_id',
      'question_id',
      'reply',
   ];

   public function user()
   {
      return $this->belongsTo(User::class);
   }
}

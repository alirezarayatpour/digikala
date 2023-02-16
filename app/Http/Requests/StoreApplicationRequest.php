<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{
   /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
   public function authorize()
   {
      if (auth()->user()->role == 1 || auth()->user()->role == 2) {
         return true;
      } else {
         return false;
      }
   }

   /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string, mixed>
    */
   public function rules()
   {
      return [
         'image'        =>      'required|mimes:jpeg,png,jpg,gif,webp,svg',
         'link'  =>      'required',
      ];
   }

   public function messages()
   {
      return [
         'image.required' => 'پر کردن این فیلد اجباری است',
         'link.required' => 'پر کردن این فیلد اجباری است',
      ];
   }
}

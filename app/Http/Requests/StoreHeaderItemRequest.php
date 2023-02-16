<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHeaderItemRequest extends FormRequest
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
         'icon'        =>      'required',
         'item'        =>      'required|max:50',
         'link'        =>      'required',
      ];
   }

   public function messages()
   {
      return [
         'icon.required' => 'پر کردن این فیلد اجباری است',
         'item.required' => 'پر کردن این فیلد اجباری است',
         'item.max' => 'آیتم باید حداکثر 50 کاراکتر باشد',
         'link.required' => 'پر کردن این فیلد اجباری است',
      ];
   }
}

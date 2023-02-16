<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
         'cover' => 'required|mimes:jpeg,png,jpg,webp,svg',
         'brand' => 'required',
         'farsi_title' => 'required',
         // 'english_title' => 'required|nullable',
         // 'property' => 'required|nullable',
         'storage' => 'required',
         'price' => 'required',
         // 'sale' => 'required|nullable',
         'category_id' => 'required',
         'intro' => 'required',
         // 'expert' => 'required|nullable',
         'specific' => 'required',
         'position' => 'required',
      ];
   }

   public function messages()
   {
      return [
         'cover.required' => 'پر کردن این فیلد اجباری است',
         'brand.required' => 'پر کردن این فیلد اجباری است',
         'cover.mimes' => 'فرمت عکس باید jpeg,png,jpg,webp,svg',
         'farsi_title.required' => 'پر کردن این فیلد اجباری است',
         // 'english_title.required' => 'پر کردن این فیلد اجباری است',
         // 'property.required' => 'پر کردن این فیلد اجباری است',
         'storage.required' => 'پر کردن این فیلد اجباری است',
         'price.required' => 'پر کردن این فیلد اجباری است',
         // 'sale.required' => 'پر کردن این فیلد اجباری است',
         'position.required' => 'پر کردن این فیلد اجباری است',
         'category_id.required' => 'پر کردن این فیلد اجباری است',
         // 'expert.required' => 'پر کردن این فیلد اجباری است',
         'specific.required' => 'پر کردن این فیلد اجباری است',
         'position.required' => 'پر کردن این فیلد اجباری است',
      ];
   }
}

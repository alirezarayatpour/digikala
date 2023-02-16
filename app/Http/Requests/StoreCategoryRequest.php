<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
          'image'        =>      'required|mimes:jpeg,png,jpg,gif,webp',
          'category'     =>      'required',
          'parent_id'    =>      'required',
          'parent_id'    =>      'nullable',
       ];
    }
 
    public function messages()
    {
       return [
          'image.required' => 'پر کردن این فیلد اجباری است',
          'category.required' => 'پر کردن این فیلد اجباری است',
          'parent_id.required' => 'پر کردن این فیلد اجباری است',
       ];
    }
}

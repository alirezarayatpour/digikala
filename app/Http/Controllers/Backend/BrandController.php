<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $brand = Brand::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.brand.index', compact('brand'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.brand.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreBrandRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreBrandRequest $request)
   {
      $imageName = 'brand' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('images/brand', $imageName);

      $brand = new brand([
         'farsi_name' => $request->get('farsi_name'),
         'english_name' => $request->get('english_name'),
         'image' => $imageName,
      ]);

      $brand->save();
      $message = "برند با موفقیت افزوده شد";
      return redirect()->route('brand.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Brand  $brand
    * @return \Illuminate\Http\Response
    */
   public function show(Brand $brand)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Brand  $brand
    * @return \Illuminate\Http\Response
    */
   public function edit(Brand $brand)
   {
      return view('admin.pages.brand.edit', compact('brand'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateBrandRequest  $request
    * @param  \App\Models\Backend\Brand  $brand
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateBrandRequest $request, Brand $brand)
   {
      if ($request->file('image')) {
         $imageName = 'brand' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
         $request->image->move('images/brand', $imageName);
         $brand->image        =   $imageName;
      } else {
         unset($imageName);
      }

      $brand->farsi_name        =   $request->farsi_name;
      $brand->english_name        =   $request->english_name;

      $brand->save();
      $message = "ویرایش برند انجام شد";
      return redirect()->route('brand.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Brand  $brand
    * @return \Illuminate\Http\Response
    */
   public function destroy(Brand $brand)
   {
      $brand->delete();
      $message = "حذف برند انجام شد";
      return redirect()->route('brand.index')->with('success', $message);
   }

   /**
    * @param Brand $brand
    */
   public function status(Brand $brand)
   {
      if ($brand->status === 1) {
         $brand->status = 0;
      } elseif ($brand->status === 0) {
         $brand->status = 1;
      }
      $brand->save();
      return redirect()->back();
   }
}

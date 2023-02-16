<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\ProductQuestion;
use Illuminate\Http\Request;

class ProductQuestionController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $productQuestion = ProductQuestion::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.productQuestion.index', compact('productQuestion'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      //
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\ProductQuestion  $productQuestion
    * @return \Illuminate\Http\Response
    */
   public function show(ProductQuestion $productQuestion)
   {
      return view('admin.pages.productQuestion.show', compact('productQuestion'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\ProductQuestion  $productQuestion
    * @return \Illuminate\Http\Response
    */
   public function edit(ProductQuestion $productQuestion)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Backend\ProductQuestion  $productQuestion
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, ProductQuestion $productQuestion)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\ProductQuestion  $productQuestion
    * @return \Illuminate\Http\Response
    */
   public function destroy(ProductQuestion $productQuestion)
   {
      $productQuestion->delete();
      return back();
   }

   public function status(ProductQuestion $productQuestion)
   {
      if ($productQuestion->status === 1) {
         $productQuestion->status = 0;
      } elseif ($productQuestion->status === 0) {
         $productQuestion->status = 1;
      }
      $productQuestion->save();
      return redirect()->back();
   }
}

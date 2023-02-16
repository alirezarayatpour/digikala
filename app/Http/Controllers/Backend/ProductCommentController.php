<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\ProductComment;
use Illuminate\Http\Request;

class ProductCommentController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $productComment = ProductComment::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.productComment.index', compact('productComment'));
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
    * @param  \App\Models\Backend\ProductComment  $productComment
    * @return \Illuminate\Http\Response
    */
   public function show(ProductComment $productComment)
   {
      return view('admin.pages.productComment.show', compact('productComment'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\ProductComment  $productComment
    * @return \Illuminate\Http\Response
    */
   public function edit(ProductComment $productComment)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Backend\ProductComment  $productComment
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, ProductComment $productComment)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\ProductComment  $productComment
    * @return \Illuminate\Http\Response
    */
   public function destroy(ProductComment $productComment)
   {
      $productComment->delete();
      return back();
   }

   public function status(ProductComment $productComment)
   {
      if ($productComment->status === 1) {
         $productComment->status = 0;
      } elseif ($productComment->status === 0) {
         $productComment->status = 1;
      }
      $productComment->save();
      return redirect()->back();
   }
}

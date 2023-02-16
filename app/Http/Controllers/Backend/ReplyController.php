<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\ProductQuestion;
use App\Models\Backend\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(ProductQuestion $productQuestion)
   {
      return view('admin.pages.reply.reply', compact('productQuestion'));
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
   public function store(Request $request, Reply $reply, ProductQuestion $productQuestion)
   {
      $reply = new Reply([
         'user_id' => auth()->user()->id,
         'question_id' => $productQuestion->id,
         'reply' => $request->get('reply'),
      ]);

      $reply->save();
      return redirect()->route('productQuestion.index');
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Reply  $reply
    * @return \Illuminate\Http\Response
    */
   public function show()
   {
      $replies = Reply::query()->get();
      return view('admin.pages.reply.index', compact('replies'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Reply  $reply
    * @return \Illuminate\Http\Response
    */
   public function edit(Reply $reply)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Backend\Reply  $reply
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Reply $reply)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Reply  $reply
    * @return \Illuminate\Http\Response
    */
   public function destroy(Reply $reply)
   {
      $reply->delete();
      return back();
   }

   /**
    * @param Reply $reply
    */
   public function status(Reply $reply)
   {
      if ($reply->status === 1) {
         $reply->status = 0;
      } elseif ($reply->status === 0) {
         $reply->status = 1;
      }
      $reply->save();
      return redirect()->back();
   }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\FooterText;
use App\Http\Requests\StoreFooterTextRequest;
use App\Http\Requests\UpdateFooterTextRequest;

class FooterTextController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $footerText = FooterText::query()->orderBy('id', 'DESC')->get();
      return view('admin.pages.footerText.index', compact('footerText'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.footerText.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreFooterTextRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreFooterTextRequest $request)
   {
      $footerText = new FooterText([
         'text' => $request->get('text'),
      ]);

      $footerText->save();
      $message = "متن با موفقیت افزوده شد";
      return redirect()->route('footerText.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\FooterText  $footerText
    * @return \Illuminate\Http\Response
    */
   public function show(FooterText $footerText)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\FooterText  $footerText
    * @return \Illuminate\Http\Response
    */
   public function edit(FooterText $footerText)
   {
      return view('admin.pages.footerText.edit', compact('footerText'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateFooterTextRequest  $request
    * @param  \App\Models\Backend\FooterText  $footerText
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateFooterTextRequest $request, FooterText $footerText)
   {
      $footerText->update($request->all());
      $message = "متن با موفقیت ویرایش شد";
      return redirect()->route('footerText.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\FooterText  $footerText
    * @return \Illuminate\Http\Response
    */
   public function destroy(FooterText $footerText)
   {
      $footerText->delete();
      $message = "متن با موفقیت حذف شد";
      return redirect()->route('footerText.index')->with('success', $message);
   }

   /**
    * @param FooterText $footerText
    */
   public function status(FooterText $footerText)
   {
      if ($footerText->status === 1) {
         $footerText->status = 0;
      } elseif ($footerText->status === 0) {
         $footerText->status = 1;
      }
      $footerText->save();
      return redirect()->back();
   }
}

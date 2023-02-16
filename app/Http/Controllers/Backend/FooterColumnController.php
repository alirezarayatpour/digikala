<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\FooterColumn;
use App\Http\Requests\StoreFooterColumnRequest;
use App\Http\Requests\UpdateFooterColumnRequest;

class FooterColumnController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $footerColumn = FooterColumn::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.footerColumn.index', compact('footerColumn'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.footerColumn.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreFooterColumnRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreFooterColumnRequest $request)
   {
      $footerColumn = new FooterColumn([
         'title' => $request->get('title'),
         'position' => $request->get('position'),
      ]);

      $footerColumn->save();
      $message = "عنوان با موفقیت افزوده شد";
      return redirect()->route('footerColumn.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\FooterColumn  $footerColumn
    * @return \Illuminate\Http\Response
    */
   public function show(FooterColumn $footerColumn)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\FooterColumn  $footerColumn
    * @return \Illuminate\Http\Response
    */
   public function edit(FooterColumn $footerColumn)
   {
      return view('admin.pages.footerColumn.edit', compact('footerColumn'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateFooterColumnRequest  $request
    * @param  \App\Models\Backend\FooterColumn  $footerColumn
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateFooterColumnRequest $request, FooterColumn $footerColumn)
   {
      $footerColumn->update($request->all());
      $message = "عنوان با موفقیت ویرایش شد";
      return redirect()->route('footerColumn.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\FooterColumn  $footerColumn
    * @return \Illuminate\Http\Response
    */
   public function destroy(FooterColumn $footerColumn)
   {
      $footerColumn->delete();
      $message = "عنوان با موفقیت حذف شد";
      return redirect()->route('footerColumn.index')->with('success', $message);
   }

   /**
    * @param FooterColumn $footerColumn
    */
   public function status(FooterColumn $footerColumn)
   {
      if ($footerColumn->status === 1) {
         $footerColumn->status = 0;
      } elseif ($footerColumn->status === 0) {
         $footerColumn->status = 1;
      }
      $footerColumn->save();
      return redirect()->back();
   }
}

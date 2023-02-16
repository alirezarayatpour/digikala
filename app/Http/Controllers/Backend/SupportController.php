<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Support;
use App\Http\Requests\StoreSupportRequest;
use App\Http\Requests\UpdateSupportRequest;

class SupportController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $support = Support::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.support.index', compact('support'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.support.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreSupportRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreSupportRequest $request)
   {
      $support = new Support([
         'tel' => $request->get('tel'),
      ]);

      $support->save();
      $message = "محتوا با موفقیت افزوده شد";
      return redirect()->route('support.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Support  $support
    * @return \Illuminate\Http\Response
    */
   public function show(Support $support)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Support  $support
    * @return \Illuminate\Http\Response
    */
   public function edit(Support $support)
   {
      return view('admin.pages.support.edit', compact('support'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateSupportRequest  $request
    * @param  \App\Models\Backend\Support  $support
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateSupportRequest $request, Support $support)
   {
      $support->update($request->all());
      $message = "محتوا با موفقیت ویرایش شد";
      return redirect()->route('support.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Support  $support
    * @return \Illuminate\Http\Response
    */
   public function destroy(Support $support)
   {
      $support->delete();
      $message = "محتوا با موفقیت حذف شد";
      return redirect()->route('support.index')->with('success', $message);
   }

   /**
    * @param Support $support
    */
   public function status(Support $support)
   {
      if ($support->status === 1) {
         $support->status = 0;
      } elseif ($support->status === 0) {
         $support->status = 1;
      }
      $support->save();
      return redirect()->back();
   }
}

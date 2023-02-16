<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Social;
use App\Http\Requests\StoreSocialRequest;
use App\Http\Requests\UpdateSocialRequest;

class SocialController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $social = Social::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.social.index', compact('social'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.social.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreSocialRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreSocialRequest $request)
   {
      $social = new Social([
         'icon' => $request->get('icon'),
         'link' => $request->get('link'),
      ]);

      $social->save();
      $message = "شبکه اجتماعی جدید با موفقیت افزوده شد";
      return redirect()->route('social.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Social  $social
    * @return \Illuminate\Http\Response
    */
   public function show(Social $social)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Social  $social
    * @return \Illuminate\Http\Response
    */
   public function edit(Social $social)
   {
      return view('admin.pages.social.edit', compact('social'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateSocialRequest  $request
    * @param  \App\Models\Backend\Social  $social
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateSocialRequest $request, Social $social)
   {
      $social->update($request->all());
      $message = "شبکه اجتماعی ویرایش شد";
      return redirect()->route('social.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Social  $social
    * @return \Illuminate\Http\Response
    */
   public function destroy(Social $social)
   {
      $social->delete();
      $message = "شبکه اجتماعی حذف شد";
      return redirect()->route('social.index')->with('success', $message);
   }

   /**
    * @param Social $social
    */
   public function status(Social $social)
   {
      if ($social->status === 1) {
         $social->status = 0;
      } elseif ($social->status === 0) {
         $social->status = 1;
      }
      $social->save();
      return redirect()->back();
   }
}

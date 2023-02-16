<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Logo;
use App\Http\Requests\StoreLogoRequest;
use App\Http\Requests\UpdateLogoRequest;

class LogoController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $logo = Logo::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.logo.index', compact('logo'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.logo.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreLogoRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreLogoRequest $request)
   {
      $imageName = 'logo' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('images/logo', $imageName);

      $logo = new logo([
         'image' => $imageName,
         'position' => $request->get('position'),
      ]);

      $logo->save();
      $message = "لوگو با موفقیت افزوده شد";
      return redirect()->route('logo.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Logo  $logo
    * @return \Illuminate\Http\Response
    */
   public function show(Logo $logo)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Logo  $logo
    * @return \Illuminate\Http\Response
    */
   public function edit(Logo $logo)
   {
      return view('admin.pages.logo.edit', compact('logo'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateLogoRequest  $request
    * @param  \App\Models\Backend\Logo  $logo
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateLogoRequest $request, Logo $logo)
   {
      if($request->file('image')) {
         $imageName = 'logo' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
         $request->image->move('images/logo', $imageName);
         $logo->image        =   $imageName;
      } else {
         unset($imageName);
      }

      $logo->position  =   $request->position;

      $logo->save();
      $message = "ویرایش لوگو انجام شد";
      return redirect()->route('logo.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Logo  $logo
    * @return \Illuminate\Http\Response
    */
   public function destroy(Logo $logo)
   {
      $logo->delete();
      $message = "حذف لوگو انجام شد";
      return redirect()->route('logo.index')->with('success', $message);
   }
   /**
    * @param logo $logo
    */
   public function status(logo $logo)
   {
      if ($logo->status === 1) {
         $logo->status = 0;
      } elseif ($logo->status === 0) {
         $logo->status = 1;
      }
      $logo->save();
      return redirect()->back();
   }
}

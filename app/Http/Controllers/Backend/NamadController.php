<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Namad;
use App\Http\Requests\StoreNamadRequest;
use App\Http\Requests\UpdateNamadRequest;

class NamadController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $namad = Namad::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.namad.index', compact('namad'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.namad.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreNamadRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreNamadRequest $request)
   {
      $imageName = 'namad' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('images/namad', $imageName);

      $namad = new Namad([
         'image' => $imageName,
         'link' => $request->get('link'),
      ]);

      $namad->save();
      $message = "نماد جدید با موفقیت افزوده شد";
      return redirect()->route('namad.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Namad  $namad
    * @return \Illuminate\Http\Response
    */
   public function show(Namad $namad)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Namad  $namad
    * @return \Illuminate\Http\Response
    */
   public function edit(Namad $namad)
   {
      return view('admin.pages.namad.edit', compact('namad'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateNamadRequest  $request
    * @param  \App\Models\Backend\Namad  $namad
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateNamadRequest $request, Namad $namad)
   {
      if ($request->file('image')) {
         $imageName = 'namad' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
         $request->image->move('images/namad', $imageName);
         $namad->image        =   $imageName;
      } else {
         unset($imageName);
      }

      $namad->link        =   $request->link;

      $namad->save();
      $message = "ویرایش نماد انجام شد";
      return redirect()->route('namad.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Namad  $namad
    * @return \Illuminate\Http\Response
    */
   public function destroy(Namad $namad)
   {
      $namad->delete();
      $message = "حذف نماد انجام شد";
      return redirect()->route('namad.index')->with('success', $message);
   }

   /**
    * @param Namad $namad
    */
   public function status(Namad $namad)
   {
      if ($namad->status === 1) {
         $namad->status = 0;
      } elseif ($namad->status === 0) {
         $namad->status = 1;
      }
      $namad->save();
      return redirect()->back();
   }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $service = Service::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.service.index', compact('service'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.service.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreServiceRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreServiceRequest $request)
   {
      $imageName = 'service' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('images/service', $imageName);

      $service = new Service([
         'image' => $imageName,
         'text' => $request->get('text'),
      ]);

      $service->save();
      $message = "محتوا جدید با موفقیت افزوده شد";
      return redirect()->route('service.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Service  $service
    * @return \Illuminate\Http\Response
    */
   public function show(Service $service)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Service  $service
    * @return \Illuminate\Http\Response
    */
   public function edit(Service $service)
   {
      return view('admin.pages.service.edit', compact('service'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateServiceRequest  $request
    * @param  \App\Models\Backend\Service  $service
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateServiceRequest $request, Service $service)
   {
      if ($request->file('image')) {
         $imageName = 'service' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
         $request->image->move('images/service', $imageName);
         $service->image        =   $imageName;
      } else {
         unset($imageName);
      }

      $service->link        =   $request->link;

      $service->save();
      $message = "ویرایش محتوا انجام شد";
      return redirect()->route('service.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Service  $service
    * @return \Illuminate\Http\Response
    */
   public function destroy(Service $service)
   {
      $service->delete();
      $message = "حذف محتوا انجام شد";
      return redirect()->route('service.index')->with('success', $message);
   }

   /**
    * @param Service $service
    */
   public function status(Service $service)
   {
      if ($service->status === 1) {
         $service->status = 0;
      } elseif ($service->status === 0) {
         $service->status = 1;
      }
      $service->save();
      return redirect()->back();
   }
}

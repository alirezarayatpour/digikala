<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Backend\Application;

class ApplicationController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $application = Application::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.application.index', compact('application'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.application.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreApplicationRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreApplicationRequest $request)
   {
      $imageName = 'application' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('images/application', $imageName);

      $application = new Application([
         'image' => $imageName,
         'link' => $request->get('link'),
      ]);

      $application->save();
      $message = "اپلیکیشن جدید با موفقیت افزوده شد";
      return redirect()->route('application.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Application  $application
    * @return \Illuminate\Http\Response
    */
   public function show(Application $application)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Application  $application
    * @return \Illuminate\Http\Response
    */
   public function edit(Application $application)
   {
      return view('admin.pages.application.edit', compact('application'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateApplicationRequest  $request
    * @param  \App\Models\Backend\Application  $application
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateApplicationRequest $request, Application $application)
   {
      if ($request->file('image')) {
         $imageName = 'application' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
         $request->image->move('images/application', $imageName);
         $application->image        =   $imageName;
      } else {
         unset($imageName);
      }

      $application->link        =   $request->link;

      $application->save();
      $message = "ویرایش اپلیکیشن انجام شد";
      return redirect()->route('application.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Application  $application
    * @return \Illuminate\Http\Response
    */
   public function destroy(Application $application)
   {
      $application->delete();
      $message = "حذف اپلیکیشن انجام شد";
      return redirect()->route('application.index')->with('success', $message);
   }

   /**
    * @param Application $application
    */
   public function status(Application $application)
   {
      if ($application->status === 1) {
         $application->status = 0;
      } elseif ($application->status === 0) {
         $application->status = 1;
      }
      $application->save();
      return redirect()->back();
   }
}

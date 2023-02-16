<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Category;
use App\Models\Backend\mainBanner;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoremainBannerRequest;
use App\Http\Requests\UpdatemainBannerRequest;

class MainBannerController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $mainBanner = mainBanner::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.mainBanner.index', compact('mainBanner'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $category = Category::where('parent_id', '!=', '0')->get();
      return view('admin.pages.mainBanner.create', compact('category'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoremainBannerRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoremainBannerRequest $request)
   {
      $imageName = 'main-banner' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('images/main-banner', $imageName);

      $mainBanner = new mainBanner([
         'image' => $imageName,
         'category_id'  => $request->get('category_id'),
         'position' => $request->get('position'),
      ]);

      $mainBanner->save();
      $message = "بنر جدید با موفقیت افزوده شد";
      return redirect()->route('mainBanner.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\mainBanner  $mainBanner
    * @return \Illuminate\Http\Response
    */
   public function show(mainBanner $mainBanner)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\mainBanner  $mainBanner
    * @return \Illuminate\Http\Response
    */
   public function edit(mainBanner $mainBanner)
   {
      $category = Category::where('parent_id', '!=', '0')->get();
      return view('admin.pages.mainBanner.edit', compact('mainBanner', 'category'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdatemainBannerRequest  $request
    * @param  \App\Models\Backend\mainBanner  $mainBanner
    * @return \Illuminate\Http\Response
    */
   public function update(UpdatemainBannerRequest $request, mainBanner $mainBanner)
   {
      if ($request->file('image')) {
         $imageName = 'main-banner' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
         $request->image->move('images/main-banner', $imageName);
         $mainBanner->image        =   $imageName;
      } else {
         unset($imageName);
      }

      $mainBanner->category_id        =   $request->category_id;
      $mainBanner->position  =   $request->position;

      $mainBanner->save();
      $message = "ویرایش بنر انجام شد";
      return redirect()->route('mainBanner.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\mainBanner  $mainBanner
    * @return \Illuminate\Http\Response
    */
   public function destroy(mainBanner $mainBanner)
   {
      $mainBanner->delete();
      $message = "حذف بنر انجام شد";
      return redirect()->route('mainBanner.index')->with('success', $message);
   }

   /**
    * @param mainBanner $mainBanner
    */
   public function status(mainBanner $mainBanner)
   {
      if ($mainBanner->status === 1) {
         $mainBanner->status = 0;
      } elseif ($mainBanner->status === 0) {
         $mainBanner->status = 1;
      }
      $mainBanner->save();
      return redirect()->back();
   }
}

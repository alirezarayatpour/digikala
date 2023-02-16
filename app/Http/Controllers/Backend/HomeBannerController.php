<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\homeBanner;
use App\Http\Requests\StorehomeBannerRequest;
use App\Http\Requests\UpdatehomeBannerRequest;
use App\Models\Backend\Category;

class HomeBannerController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $homeBanner = HomeBanner::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.homeBanner.index', compact('homeBanner'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $category = Category::where('parent_id', '!=', '0')->get();
      return view('admin.pages.homeBanner.create', compact('category'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StorehomeBannerRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StorehomeBannerRequest $request)
   {
      $imageName = 'home-banner' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('images/home-banner', $imageName);

      $homeBanner = new HomeBanner([
         'image' => $imageName,
         'category_id'  => $request->get('category_id'),
         'position' => $request->get('position'),
      ]);

      $homeBanner->save();
      $message = "بنر جدید با موفقیت افزوده شد";
      return redirect()->route('homeBanner.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\homeBanner  $homeBanner
    * @return \Illuminate\Http\Response
    */
   public function show(homeBanner $homeBanner)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\homeBanner  $homeBanner
    * @return \Illuminate\Http\Response
    */
   public function edit(homeBanner $homeBanner)
   {
      $category = Category::where('parent_id', '!=', '0')->get();
      return view('admin.pages.homeBanner.edit', compact('homeBanner', 'category'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdatehomeBannerRequest  $request
    * @param  \App\Models\Backend\homeBanner  $homeBanner
    * @return \Illuminate\Http\Response
    */
   public function update(UpdatehomeBannerRequest $request, homeBanner $homeBanner)
   {
      if ($request->file('image')) {
         $imageName = 'home-banner' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
         $request->image->move('images/home-banner', $imageName);
         $homeBanner->image        =   $imageName;
      } else {
         unset($imageName);
      }

      $homeBanner->category_id        =   $request->category_id;
      $homeBanner->position  =   $request->position;

      $homeBanner->save();
      $message = "ویرایش بنر انجام شد";
      return redirect()->route('homeBanner.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\homeBanner  $homeBanner
    * @return \Illuminate\Http\Response
    */
   public function destroy(homeBanner $homeBanner)
   {
      $homeBanner->delete();
      $message = "حذف بنر انجام شد";
      return redirect()->route('homeBanner.index')->with('success', $message);
   }

   /**
    * @param HomeBanner $homeBanner
    */
   public function status(HomeBanner $homeBanner)
   {
      if ($homeBanner->status === 1) {
         $homeBanner->status = 0;
      } elseif ($homeBanner->status === 0) {
         $homeBanner->status = 1;
      }
      $homeBanner->save();
      return redirect()->back();
   }
}

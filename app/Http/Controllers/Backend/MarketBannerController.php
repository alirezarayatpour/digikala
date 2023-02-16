<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Category;
use App\Http\Controllers\Controller;
use App\Models\Backend\marketBanner;
use App\Http\Requests\StoremarketBannerRequest;
use App\Http\Requests\UpdatemarketBannerRequest;

class MarketBannerController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $marketBanner = marketBanner::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.marketBanner.index', compact('marketBanner'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $category = Category::where('parent_id', '!=', '0')->get();
      return view('admin.pages.marketBanner.create', compact('category'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoremarketBannerRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoremarketBannerRequest $request)
   {
      $imageName = 'market-banner' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('images/market-banner', $imageName);

      $marketBanner = new marketBanner([
         'image' => $imageName,
         'category_id'  => $request->get('category_id'),
         'position' => $request->get('position'),
      ]);

      $marketBanner->save();
      $message = "بنر جدید با موفقیت افزوده شد";
      return redirect()->route('marketBanner.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\marketBanner  $marketBanner
    * @return \Illuminate\Http\Response
    */
   public function show(marketBanner $marketBanner)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\marketBanner  $marketBanner
    * @return \Illuminate\Http\Response
    */
   public function edit(marketBanner $marketBanner)
   {
      $category = Category::where('parent_id', '!=', '0')->get();
      return view('admin.pages.marketBanner.edit', compact('marketBanner', 'category'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdatemarketBannerRequest  $request
    * @param  \App\Models\Backend\marketBanner  $marketBanner
    * @return \Illuminate\Http\Response
    */
   public function update(UpdatemarketBannerRequest $request, marketBanner $marketBanner)
   {
      if ($request->file('image')) {
         $imageName = 'market-banner' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
         $request->image->move('images/market-banner', $imageName);
         $marketBanner->image        =   $imageName;
      } else {
         unset($imageName);
      }

      $marketBanner->category_id        =   $request->category_id;
      $marketBanner->position  =   $request->position;

      $marketBanner->save();
      $message = "ویرایش بنر انجام شد";
      return redirect()->route('marketBanner.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\marketBanner  $marketBanner
    * @return \Illuminate\Http\Response
    */
   public function destroy(marketBanner $marketBanner)
   {
      $marketBanner->delete();
      $message = "حذف بنر انجام شد";
      return redirect()->route('marketBanner.index')->with('success', $message);
   }

   /**
    * @param marketBanner $marketBanner
    */
   public function status(marketBanner $marketBanner)
   {
      if ($marketBanner->status === 1) {
         $marketBanner->status = 0;
      } elseif ($marketBanner->status === 0) {
         $marketBanner->status = 1;
      }
      $marketBanner->save();
      return redirect()->back();
   }
}

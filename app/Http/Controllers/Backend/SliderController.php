<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Slider;
use App\Models\Backend\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;

class SliderController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $slider = Slider::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.slider.index', compact('slider'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $category = Category::where('parent_id', '!=', '0')->get();
      return view('admin.pages.slider.create', compact('category'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreSliderRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreSliderRequest $request)
   {
      $imageName = 'slider' . '-' . time() . $request->image->getClientOriginalExtension();
      $request->image->move('images/slider', $imageName);

      $slider = new Slider([
         'image' => $imageName,
         'category_id' => $request->get('category_id'),
         'position' => $request->get('position'),
      ]);

      $slider->save();
      $message = "اسلایدر جدید با موفقیت افزوده شد";
      return redirect()->route('slider.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Slider  $slider
    * @return \Illuminate\Http\Response
    */
   public function show(Slider $slider)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Slider  $slider
    * @return \Illuminate\Http\Response
    */
   public function edit(Slider $slider)
   {
      $category = Category::where('parent_id', '!=', '0')->get();
      return view('admin.pages.slider.edit', compact('slider', 'category'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateSliderRequest  $request
    * @param  \App\Models\Backend\Slider  $slider
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateSliderRequest $request, Slider $slider)
   {
      if ($request->file('image')) {
         $imageName = 'slider' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
         $request->image->move('images/slider', $imageName);
         $slider->image        =   $imageName;
      } else {
         unset($imageName);
      }

      $slider->category_id        =   $request->category_id;
      $slider->position  =   $request->position;

      $slider->save();
      $message = "ویرایش اسلایدر انجام شد";
      return redirect()->route('slider.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Slider  $slider
    * @return \Illuminate\Http\Response
    */
   public function destroy(Slider $slider)
   {
      $slider->delete();
      $message = "حذف اسلایدر انجام شد";
      return redirect()->route('slider.index')->with('success', $message);
   }

   /**
    * @param Slider $slider
    */
   public function status(Slider $slider)
   {
      if ($slider->status === 1) {
         $slider->status = 0;
      } elseif ($slider->status === 0) {
         $slider->status = 1;
      }
      $slider->save();
      return redirect()->back();
   }
}

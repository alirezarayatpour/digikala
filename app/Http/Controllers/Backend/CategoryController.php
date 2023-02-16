<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $category = Category::query()->orderBy('id', 'DESC')->paginate(10);
      $parent = Category::query()->where('parent_id', '0')->get();
      $children = Category::query()->get();

      return view('admin.pages.category.index', compact('category', 'parent', 'children'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $parent = Category::where('parent_id', '0')->get();
      $child = Category::where('parent_id', '!=', '0')->get();

      return view('admin.pages.category.create', compact('parent', 'child'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreCategoryRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreCategoryRequest $request)
   {
      $imageName = 'category' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('images/category', $imageName);

      $category = new Category([
         'category' => $request->get('category'),
         'parent_id' => $request->get('parent_id'),
         'child_id' => $request->get('child_id'),
         'image' => $imageName,
         'slug' => str_replace(' ', '-', $request->get('category')),
      ]);

      $category->save();
      $message = "دسته‌بندی جدید با موفقیت افزوده شد";
      return redirect()->route('category.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Category  $category
    * @return \Illuminate\Http\Response
    */
   public function show(Category $category)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Category  $category
    * @return \Illuminate\Http\Response
    */
   public function edit(Category $category)
   {
      $parents = Category::where('parent_id', 0)->get();
      $childs = Category::where('child_id', 0,)->where('parent_id', '!=', '0')->get();
      
      return view('admin.pages.category.edit', compact('category', 'parents', 'childs'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateCategoryRequest  $request
    * @param  \App\Models\Backend\Category  $category
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateCategoryRequest $request, Category $category)
   {
      if ($request->file('image')) {
         $imageName = 'category' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
         $request->image->move('images/category', $imageName);
         $category->image        =   $imageName;
      } else {
         unset($imageName);
      }

      $category->category        =   $request->category;
      $category->slug            =   $request->category;
      $category->parent_id       =   $request->parent_id;
      $category->child_id     =   $request->child_id;

      $category->save();
      $message = "دسته‌بندی با موفقیت ویرایش شد";
      return redirect()->route('category.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Category  $category
    * @return \Illuminate\Http\Response
    */
   public function destroy(Category $category)
   {
      $category->delete();
      $message = "دسته‌بندی با موفقیت حذف شد";
      return redirect()->route('category.index')->with('success', $message);
   }

   /**
    * @param Category $category
    */
   public function status(Category $category)
   {
      if ($category->status === 1) {
         $category->status = 0;
      } elseif ($category->status === 0) {
         $category->status = 1;
      }
      $category->save();
      return redirect()->back();
   }
}

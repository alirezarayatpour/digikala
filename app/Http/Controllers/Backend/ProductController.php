<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Brand;
use App\Models\Backend\Image;
use App\Models\Backend\Product;
use App\Models\Backend\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $products = Product::query()->orderBy('id', 'DESC')->paginate(5);
      return view('admin.pages.product.index', compact('products'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $categories = Category::query()->where('child_id', '!=', '0')->get();
      $brand = Brand::query()->get();
      return view('admin.pages.product.create', compact('categories', 'brand'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreProductRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreProductRequest $request)
   {
      $imageName = 'cover' . '-' . time() . '.' . $request->cover->getClientOriginalExtension();
      $request->cover->move('image/cover', $imageName);

      $product = new Product([
         'farsi_title'       =>      $request->get('farsi_title'),
         'english_title'     =>      $request->get('english_title'),
         'brand'             =>      $request->get('brand'),
         'property'          =>      $request->get('property'),
         'storage'           =>      $request->get('storage'),
         'price'             =>      $request->get('price'),
         'sale'              =>      $request->get('sale'),
         'category_id'       =>      $request->get('category_id'),
         'intro'             =>      $request->get('intro'),
         'expert'            =>      $request->get('expert'),
         'specific'          =>      $request->get('specific'),
         'position'          =>      $request->get('position'),
         'slug'              =>      str_replace(' ', '-', $request->get('farsi_title')),
         'cover'             =>      $imageName,
      ]);
      $product->save();

      if ($request->hasFile('images')) {
         $files = $request->file('images');
         foreach ($files as $file) {
            $imageName = 'images' . '-' . time() . '-' . $file->getClientOriginalName();
            $request['product_id'] = $product->id;
            $request['image'] = $imageName;
            $file->move('image/gallery/', $imageName);
            Image::create($request->all());
         }
      }

      $message = "محصول جدید با موفقیت افزوده شد";
      return redirect()->route('product.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Product  $product
    * @return \Illuminate\Http\Response
    */
   public function show(Product $product)
   {
      $images = Image::query()->get();
      return view('admin.pages.product.show', compact('product', 'images'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Product  $product
    * @return \Illuminate\Http\Response
    */
   public function edit(Product $product)
   {
      $images = Image::query()->get();
      $categories = Category::query()->where('child_id', '!=', '0')->get();
      $brand = Brand::query()->get();
      return view('admin.pages.product.edit', compact('product', 'images', 'categories', 'brand'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateProductRequest  $request
    * @param  \App\Models\Backend\Product  $product
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateProductRequest $request, Product $product, Image $image)
   {
      if ($request->file('cover')) {
         $imageName = 'cover' . '-' . time() . '.' . $request->cover->getClientOriginalExtension();
         $request->image->move('images/cover', $imageName);
         $product->request        =   $imageName;
      } else {
         unset($imageName);
      }

      $product->farsi_title       =      $request->farsi_title;
      $product->slug              =      $request->farsi_title;
      $product->english_title     =      $request->english_title;
      $product->brand             =      $request->brand;
      $product->property          =      $request->property;
      $product->storage           =      $request->storage;
      $product->price             =      $request->price;
      $product->sale              =      $request->sale;
      $product->category_id       =      $request->category_id;
      $product->intro             =      $request->intro;
      $product->expert            =      $request->expert;
      $product->specific          =      $request->specific;
      $product->position          =      $request->position;

      $product->save();

      if ($request->hasFile("images")) {
         $files = $request->file("images");
         foreach ($files as $file) {
            $imageName = time() . '_' . $file->getClientOriginalName();
            $request["product_id"] = $product->id;
            $request["image"] = $imageName;
            $file->move('image/gallery/', $imageName);
            Image::create($request->all());
         }
      }

      $message = "ویرایش محصول انجام شد";
      return redirect()->route('product.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Product  $product
    * @return \Illuminate\Http\Response
    */
   public function destroy(Product $product)
   {
      $images = Image::where("product_id", $product->id)->get();
      foreach ($images as $image) {
         if (File::exists("image/gallery/" . $image->image)) {
            File::delete("image/gallery/" . $image->image);
         }
      }

      $product->delete();
      $message = "حذف محصول انجام شد";
      return redirect()->route('product.index')->with('warning', $message);
   }

   /**
    * @param Product $product
    */
   public function status(Product $product)
   {
      if ($product->status === 1) {
         $product->status = 0;
      } elseif ($product->status === 0) {
         $product->status = 1;
      }
      $product->save();
      return redirect()->back();
   }
}

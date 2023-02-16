<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\HeaderItem;
use App\Http\Requests\StoreHeaderItemRequest;
use App\Http\Requests\UpdateHeaderItemRequest;

class HeaderItemController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $headerItem = HeaderItem::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.headerItem.index', compact('headerItem'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.headerItem.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreHeaderItemRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreHeaderItemRequest $request)
   {
      $headerItem = new HeaderItem([
         'icon' => $request->get('icon'),
         'item' => $request->get('item'),
         'link' => $request->get('link'),
      ]);

      $headerItem->save();
      $message = "آیتم با موفقیت افزوده شد";
      return redirect()->route('headerItem.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\HeaderItem  $headerItem
    * @return \Illuminate\Http\Response
    */
   public function show(HeaderItem $headerItem)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\HeaderItem  $headerItem
    * @return \Illuminate\Http\Response
    */
   public function edit(HeaderItem $headerItem)
   {
      return view('admin.pages.headerItem.edit', compact('headerItem'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateHeaderItemRequest  $request
    * @param  \App\Models\Backend\HeaderItem  $headerItem
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateHeaderItemRequest $request, HeaderItem $headerItem)
   {
      $headerItem->update($request->all());
      $message = "آیتم با موفقیت ویرایش شد";
      return redirect()->route('headerItem.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\HeaderItem  $headerItem
    * @return \Illuminate\Http\Response
    */
   public function destroy(HeaderItem $headerItem)
   {
      $headerItem->delete();
      $message = "آیتم با موفقیت حذف شد";
      return redirect()->route('headerItem.index')->with('success', $message);
   }

   /**
    * @param HeaderItem $headerItem
    */
   public function status(HeaderItem $headerItem)
   {
      if ($headerItem->status === 1) {
         $headerItem->status = 0;
      } elseif ($headerItem->status === 0) {
         $headerItem->status = 1;
      }
      $headerItem->save();
      return redirect()->back();
   }
}

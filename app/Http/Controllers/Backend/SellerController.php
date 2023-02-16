<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
   public function index()
   {
      $seller = Seller::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.seller.index', compact('seller'));
   }

   public function destroy(Seller  $seller)
   {
      $seller->delete();
      $message = "آیتم حذف شد";
      return redirect()->route('seller.index')->with('success', $message);
   }

   public function status(Seller $seller)
   {
      if ($seller->status === 1) {
         $seller->status = 0;
      } elseif ($seller->status === 0) {
         $seller->status = 1;
      }
      $seller->save();
      return redirect()->back();
   }
}

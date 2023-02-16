<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
       $vendors = Vendor::query()->orderBy('id', 'DESC')->paginate(10);
       return view('admin.pages.vendor.index', compact('vendors'));
    }

    public function destroy(Vendor $vendor)
    {
       $vendor->delete();
       $message = "حذف فروشنده با موفقیت انجام شد";
       return redirect()->route('vendor.index')->with('success', $message);
    }
}

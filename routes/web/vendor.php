<?php

use App\Http\Controllers\Backend\VendorController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/vendor')->controller(VendorController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('vendor.index');
      Route::post('/destroy/{vendor}', 'destroy')->name('vendor.destroy');
   });

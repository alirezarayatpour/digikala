<?php

use App\Http\Controllers\Backend\SellerController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/seller')->controller(SellerController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('seller.index');
      Route::post('/destroy/{seller}', 'destroy')->name('seller.destroy');
      Route::get('/status/{seller}', 'status')->name('seller.status');
   });

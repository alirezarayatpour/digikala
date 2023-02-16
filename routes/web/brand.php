<?php

use App\Http\Controllers\Backend\BrandController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/brand')->controller(BrandController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('brand.index');
      Route::get('/create', 'create')->name('brand.create');
      Route::post('/store', 'store')->name('brand.store');
      Route::get('/edit/{brand}', 'edit')->name('brand.edit');
      Route::post('/update/{brand}', 'update')->name('brand.update');
      Route::post('/destroy/{brand}', 'destroy')->name('brand.destroy');
      Route::get('/status/{brand}', 'status')->name('brand.status');
});
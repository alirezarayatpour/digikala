<?php

use App\Http\Controllers\Backend\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/product')->controller(ProductController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('product.index');
      Route::get('/create', 'create')->name('product.create');
      Route::post('/store', 'store')->name('product.store');
      Route::get('/edit/{product}', 'edit')->name('product.edit');
      Route::get('/show/{product}', 'show')->name('product.show');
      Route::post('/update/{product}', 'update')->name('product.update');
      Route::post('/destroy/{product}', 'destroy')->name('product.destroy');
      Route::get('/status/{product}', 'status')->name('product.status');
      Route::get('/exist/{product}', 'exist')->name('product.exist');
   });

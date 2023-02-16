<?php

use App\Http\Controllers\Backend\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/category')->controller(CategoryController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('category.index');
      Route::get('/create', 'create')->name('category.create');
      Route::post('/store', 'store')->name('category.store');
      Route::get('/edit/{category}', 'edit')->name('category.edit');
      Route::post('/update/{category}', 'update')->name('category.update');
      Route::post('/destroy/{category}', 'destroy')->name('category.destroy');
      Route::get('/status/{category}', 'status')->name('category.status');
});
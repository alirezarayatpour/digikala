<?php

use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/slider')->controller(SliderController::class)
   ->middleware('CheckAdmin')
   ->group(function(){
      Route::get('/', 'index')->name('slider.index');
      Route::get('/create', 'create')->name('slider.create');
      Route::post('/store', 'store')->name('slider.store');
      Route::get('/edit/{slider}', 'edit')->name('slider.edit');
      Route::post('/update/{slider}', 'update')->name('slider.update');
      Route::post('/destroy/{slider}', 'destroy')->name('slider.destroy');
      Route::get('/status/{slider}', 'status')->name('slider.status');
});
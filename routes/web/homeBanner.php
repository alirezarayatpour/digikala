<?php

use App\Http\Controllers\Backend\HomeBannerController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/homeBanner')->controller(HomeBannerController::class)
   ->middleware('CheckAdmin')
   ->group(function(){
      Route::get('/', 'index')->name('homeBanner.index');
      Route::get('/create', 'create')->name('homeBanner.create');
      Route::post('/store', 'store')->name('homeBanner.store');
      Route::get('/edit/{homeBanner}', 'edit')->name('homeBanner.edit');
      Route::post('/update/{homeBanner}', 'update')->name('homeBanner.update');
      Route::post('/destroy/{homeBanner}', 'destroy')->name('homeBanner.destroy');
      Route::get('/status/{homeBanner}', 'status')->name('homeBanner.status');
});
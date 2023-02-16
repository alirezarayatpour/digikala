<?php

use App\Http\Controllers\Backend\MainBannerController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/mainBanner')->controller(MainBannerController::class)
   ->middleware('CheckAdmin')
   ->group(function(){
      Route::get('/', 'index')->name('mainBanner.index');
      Route::get('/create', 'create')->name('mainBanner.create');
      Route::post('/store', 'store')->name('mainBanner.store');
      Route::get('/edit/{mainBanner}', 'edit')->name('mainBanner.edit');
      Route::post('/update/{mainBanner}', 'update')->name('mainBanner.update');
      Route::post('/destroy/{mainBanner}', 'destroy')->name('mainBanner.destroy');
      Route::get('/status/{mainBanner}', 'status')->name('mainBanner.status');
});
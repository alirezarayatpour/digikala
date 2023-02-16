<?php

use App\Http\Controllers\Backend\ServiceController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/service')->controller(ServiceController::class)
   ->middleware('CheckAdmin')
   ->group(function(){
      Route::get('/', 'index')->name('service.index');
      Route::get('/create', 'create')->name('service.create');
      Route::post('/store', 'store')->name('service.store');
      Route::get('/edit/{service}', 'edit')->name('service.edit');
      Route::post('/update/{service}', 'update')->name('service.update');
      Route::post('/destroy/{service}', 'destroy')->name('service.destroy');
      Route::get('/status/{service}', 'status')->name('service.status');
});
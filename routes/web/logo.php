<?php

use App\Http\Controllers\Backend\LogoController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/logo')->controller(LogoController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('logo.index');
      Route::get('/create', 'create')->name('logo.create');
      Route::post('/store', 'store')->name('logo.store');
      Route::get('/edit/{logo}', 'edit')->name('logo.edit');
      Route::post('/update/{logo}', 'update')->name('logo.update');
      Route::post('/destroy/{logo}', 'destroy')->name('logo.destroy');
      Route::get('/status/{logo}', 'status')->name('logo.status');
});
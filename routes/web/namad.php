<?php

use App\Http\Controllers\Backend\NamadController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/namad')->controller(NamadController::class)
   ->middleware('CheckAdmin')
   ->group(function(){
      Route::get('/', 'index')->name('namad.index');
      Route::get('/create', 'create')->name('namad.create');
      Route::post('/store', 'store')->name('namad.store');
      Route::get('/edit/{namad}', 'edit')->name('namad.edit');
      Route::post('/update/{namad}', 'update')->name('namad.update');
      Route::post('/destroy/{namad}', 'destroy')->name('namad.destroy');
      Route::get('/status/{namad}', 'status')->name('namad.status');
});
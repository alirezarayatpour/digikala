<?php

use App\Http\Controllers\Backend\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/application')->controller(ApplicationController::class)
   ->middleware('CheckAdmin')
   ->group(function(){
      Route::get('/', 'index')->name('application.index');
      Route::get('/create', 'create')->name('application.create');
      Route::post('/store', 'store')->name('application.store');
      Route::get('/edit/{application}', 'edit')->name('application.edit');
      Route::post('/update/{application}', 'update')->name('application.update');
      Route::post('/destroy/{application}', 'destroy')->name('application.destroy');
      Route::get('/status/{application}', 'status')->name('application.status');
});
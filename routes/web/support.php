<?php

use App\Http\Controllers\Backend\SupportController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/support')->controller(SupportController::class)
   ->middleware('CheckAdmin')
   ->group(function(){
      Route::get('/', 'index')->name('support.index');
      Route::get('/create', 'create')->name('support.create');
      Route::post('/store', 'store')->name('support.store');
      Route::get('/edit/{support}', 'edit')->name('support.edit');
      Route::post('/update/{support}', 'update')->name('support.update');
      Route::post('/destroy/{support}', 'destroy')->name('support.destroy');
      Route::get('/status/{support}', 'status')->name('support.status');
});
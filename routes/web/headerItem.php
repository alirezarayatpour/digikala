<?php

use App\Http\Controllers\Backend\HeaderItemController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/headerItem')->controller(HeaderItemController::class)
   ->middleware('CheckAdmin')
   ->group(function(){
      Route::get('/', 'index')->name('headerItem.index');
      Route::get('/create', 'create')->name('headerItem.create');
      Route::post('/store', 'store')->name('headerItem.store');
      Route::get('/edit/{headerItem}', 'edit')->name('headerItem.edit');
      Route::post('/update/{headerItem}', 'update')->name('headerItem.update');
      Route::post('/destroy/{headerItem}', 'destroy')->name('headerItem.destroy');
      Route::get('/status/{headerItem}', 'status')->name('headerItem.status');
});
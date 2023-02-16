<?php

use App\Http\Controllers\Backend\FooterColumnController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/footerColumn')->controller(FooterColumnController::class)
   ->middleware('CheckAdmin')
   ->group(function(){
      Route::get('/', 'index')->name('footerColumn.index');
      Route::get('/create', 'create')->name('footerColumn.create');
      Route::post('/store', 'store')->name('footerColumn.store');
      Route::get('/edit/{footerColumn}', 'edit')->name('footerColumn.edit');
      Route::post('/update/{footerColumn}', 'update')->name('footerColumn.update');
      Route::post('/destroy/{footerColumn}', 'destroy')->name('footerColumn.destroy');
      Route::get('/status/{footerColumn}', 'status')->name('footerColumn.status');
});
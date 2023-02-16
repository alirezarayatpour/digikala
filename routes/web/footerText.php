<?php

use App\Http\Controllers\Backend\FooterTextController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/footerText')->controller(FooterTextController::class)
   ->middleware('CheckAdmin')
   ->group(function(){
      Route::get('/', 'index')->name('footerText.index');
      Route::get('/create', 'create')->name('footerText.create');
      Route::post('/store', 'store')->name('footerText.store');
      Route::get('/edit/{footerText}', 'edit')->name('footerText.edit');
      Route::post('/update/{footerText}', 'update')->name('footerText.update');
      Route::post('/destroy/{footerText}', 'destroy')->name('footerText.destroy');
      Route::get('/status/{footerText}', 'status')->name('footerText.status');
});
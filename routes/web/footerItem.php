<?php

use App\Http\Controllers\Backend\FooterItemController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/footerItem')->controller(FooterItemController::class)
   ->middleware('CheckAdmin')
   ->group(function(){
      Route::get('/', 'index')->name('footerItem.index');
      Route::get('/create', 'create')->name('footerItem.create');
      Route::post('/store', 'store')->name('footerItem.store');
      Route::get('/edit/{footerItem}', 'edit')->name('footerItem.edit');
      Route::post('/update/{footerItem}', 'update')->name('footerItem.update');
      Route::post('/destroy/{footerItem}', 'destroy')->name('footerItem.destroy');
      Route::get('/status/{footerItem}', 'status')->name('footerItem.status');
});
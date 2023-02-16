<?php

use App\Http\Controllers\Backend\SocialController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/social')->controller(SocialController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('social.index');
      Route::get('/create', 'create')->name('social.create');
      Route::post('/store', 'store')->name('social.store');
      Route::get('/edit/{social}', 'edit')->name('social.edit');
      Route::post('/update/{social}', 'update')->name('social.update');
      Route::post('/destroy/{social}', 'destroy')->name('social.destroy');
      Route::get('/status/{social}', 'status')->name('social.status');
   });

<?php

use App\Http\Controllers\Backend\EventController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/event')->controller(EventController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('event.index');
      Route::get('/create', 'create')->name('event.create');
      Route::post('/store', 'store')->name('event.store');
      Route::get('/edit/{event}', 'edit')->name('event.edit');
      Route::post('/update/{event}', 'update')->name('event.update');
      Route::post('/destroy/{event}', 'destroy')->name('event.destroy');
      Route::get('/status/{event}', 'status')->name('event.status');
});

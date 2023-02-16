<?php

use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/user')->controller(UserController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('user.index');
      Route::get('/create', 'create')->name('user.create');
      Route::post('/store', 'store')->name('user.store');
      Route::post('/register', 'register')->name('user.register');
      Route::get('/edit/{user}', 'edit')->name('user.edit');
      Route::get('/show/{user}', 'show')->name('user.show');
      Route::post('/update/{user}', 'update')->name('user.update');
      Route::post('/destroy/{user}', 'destroy')->name('user.destroy');
   });

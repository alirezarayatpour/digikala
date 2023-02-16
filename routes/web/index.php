<?php

use App\Http\Controllers\Backend\IndexController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->controller(IndexController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/index', 'index')->name('index');
   });

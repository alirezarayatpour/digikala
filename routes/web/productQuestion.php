<?php

use App\Http\Controllers\Backend\ProductQuestionController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/productQuestion')->controller(ProductQuestionController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('productQuestion.index');
      Route::get('/show/{productQuestion}', 'show')->name('productQuestion.show');
      Route::post('/destroy/{productQuestion}', 'destroy')->name('productQuestion.destroy');
      Route::get('/status/{productQuestion}', 'status')->name('productQuestion.status');
   });

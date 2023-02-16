<?php

use App\Http\Controllers\Backend\ProductCommentController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/productComment')->controller(ProductCommentController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'index')->name('productComment.index');
      Route::get('/show/{productComment}', 'show')->name('productComment.show');
      Route::post('/destroy/{productComment}', 'destroy')->name('productComment.destroy');
      Route::get('/status/{productComment}', 'status')->name('productComment.status');
   });

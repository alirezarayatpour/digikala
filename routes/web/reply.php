<?php

use App\Http\Controllers\Backend\ReplyController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/reply')->controller(ReplyController::class)
   ->middleware('CheckAdmin')
   ->group(function () {
      Route::get('/', 'show')->name('reply.show');
      Route::get('/reply/{productQuestion}', 'index')->name('reply.index');
      Route::post('/store/{productQuestion}', 'store')->name('reply.store');
      Route::post('/destroy/{reply}', 'destroy')->name('reply.destroy');
      Route::get('/status/{reply}', 'status')->name('reply.status');
   });

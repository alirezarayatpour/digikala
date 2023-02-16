<?php

use App\Http\Controllers\Frontend\ClientController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->controller(ClientController::class)->group(function () {
   Route::get('/', 'index')->name('pages.index');
   Route::get('/best-selling', 'best_selling')->name('pages.best-selling');
   Route::get('/incredible-offers', 'incredible_offers')->name('pages.incredible-offers');
   Route::get('/main/{category}', 'main')->name('pages.main');
   Route::get('/category/{category}', 'category')->name('pages.category');
   Route::get('/search', 'search')->name('pages.search');
   Route::get('/product/{product}', 'product')->name('pages.product');
   Route::get('/cart', 'cart')->name('pages.cart');

   Route::post('productComment/{product}', 'productComment')->name('productComment');
   Route::post('productQuestion/{product}', 'productQuestion')->name('productQuestion');
   Route::post('reply/{productQuestion}', 'reply')->name('reply');

   //! Cart
   Route::post('/add-to-cart/{product}', 'add_to_cart')->name('add-to-cart');
   Route::post('/add-to-cart-2/{seller}', 'add_to_cart_2')->name('add-to-cart-2');
   Route::post('/cart-plus/{cart}', 'cart_plus')->name('cart-plus');
   Route::post('/cart-minus/{cart}', 'cart_minus')->name('cart-minus');
   Route::post('/cart-remove/{cart}', 'cart_remove')->name('cart-remove');

   // Profile

   Route::get('/profile/addresses', 'addresses')->name('pages.addresses');
   Route::get('/profile/lists', 'lists')->name('pages.lists');
   Route::get('/profile/personal-info', 'personal_info')->name('pages.personal-info');
   Route::get('/profile/edit-product', 'edit_product')->name('pages.edit-product');
   Route::get('/profile/my-product', 'my_product')->name('pages.my-product');
   Route::get('/profile/vendor', 'vendor')->name('pages.vendor');
//   Route::get('/profile', 'profile')->name('pages.profile');
//   Route::get('/profile/orders', 'orders')->name('pages.orders');

   Route::post('job/{user}', 'job')->name('job');
   Route::post('birthday/{user}', 'birthday')->name('birthday');
   Route::post('info/{user}', 'info')->name('info');
   Route::post('phone/{user}', 'phone')->name('phone');
   Route::post('email/{user}', 'email')->name('email');
   Route::post('shaba/{user}', 'shaba')->name('shaba');
   Route::post('address/{user}', 'address')->name('address');
   Route::post('change_password/{user}', 'change_password')->name('change_password');
   Route::post('/detail/{user}', 'detail')->name('detail');

   Route::post('/add-to-favorite/{product}', 'add_to_favorite')->name('add-to-favorite');
   Route::post('/remove-favorite/{favorite}', 'remove_favorite')->name('remove-favorite');

   Route::post('/new/{product}', 'new')->name('product.new');
   Route::post('/change/{seller}', 'change')->name('product.change');
   Route::post('/delete/{seller}', 'delete')->name('product.delete');

   Route::post('/news-request', 'news_request')->name('news-request');
});

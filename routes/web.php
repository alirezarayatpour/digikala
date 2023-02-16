<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

require_once 'web/client.php';
require_once 'web/category.php';
require_once 'web/index.php';
require_once 'web/logo.php';
require_once 'web/social.php';
require_once 'web/brand.php';
require_once 'web/homeBanner.php';
require_once 'web/mainBanner.php';
require_once 'web/slider.php';
require_once 'web/headerItem.php';
require_once 'web/footerColumn.php';
require_once 'web/footerItem.php';
require_once 'web/footerText.php';
require_once 'web/namad.php';
require_once 'web/application.php';
require_once 'web/service.php';
require_once 'web/product.php';
require_once 'web/productComment.php';
require_once 'web/productQuestion.php';
require_once 'web/reply.php';
require_once 'web/user.php';
require_once 'web/seller.php';
require_once 'web/event.php';
require_once 'web/support.php';
require_once 'web/vendor.php';

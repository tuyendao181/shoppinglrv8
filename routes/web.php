<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {
//     return view('page.category');

// });

// Route::get('/index', [Home_Controller::class, 'index']);

Route::get('/login','App\Http\Controllers\HomeController@login')->name('login');
Route::post('/login','App\Http\Controllers\HomeController@postlogin')->name('login');
Route::get('/register','App\Http\Controllers\HomeController@register')->name('register');
Route::post('/register','App\Http\Controllers\HomeController@postregister')->name('register');

Route::get('/logout','App\Http\Controllers\HomeController@logout')->name('logout');

Route::get('/login-admin','App\Http\Controllers\HomeController@loginAdmin')->name('loginAdmin');
Route::post('/login-admin','App\Http\Controllers\HomeController@postAdmin')->name('postAdmin');
Route::get('/logout-admin','App\Http\Controllers\HomeController@logoutAdmin')->name('logoutAdmin');


// Route::get('/','App\Http\Controllers\HomeController@index')->name('home');

Route::get('/home','App\Http\Controllers\HomeController@index')->name('home');
Route::get('/','App\Http\Controllers\HomeController@index')->name('home');

Route::get('/show-product-detail/{id}','App\Http\Controllers\PageController@show_product_detail')->name('show_product_detail');
Route::get('/comment-product','App\Http\Controllers\PageController@comment_product')->name('comment_product');

Route::get('/check-product','App\Http\Controllers\PageController@check_product')->name('check_product');
Route::get('/category-detail/{id}','App\Http\Controllers\PageController@category_detail')->name('category_detail');
Route::get('/category-filter','App\Http\Controllers\PageController@category_filter')->name('category_filter');
Route::get('/category-paginate','App\Http\Controllers\PageController@category_paginate')->name('category_paginate');

Route::get('/blog-detail/{id}','App\Http\Controllers\PageController@blog_detail')->name('blog_detail');
Route::get('/blog','App\Http\Controllers\PageController@blog')->name('blog');

Route::get('/history-detail','App\Http\Controllers\PageController@history_detail')->name('history_detail');

Route::prefix('cart')->group(function (){
    Route::get('/get-cart','App\Http\Controllers\CartController@getCart')->name('getCart');
    Route::get('/post-cart','App\Http\Controllers\CartController@postCart')->name('postCart');
    Route::get('/put-cart','App\Http\Controllers\CartController@putCart')->name('putCart');
    Route::get('/delete-Cart','App\Http\Controllers\CartController@deleteCart')->name('deleteCart');
});

Route::middleware('auth')->prefix('checkout')->group(function(){
    Route::get('/get-checkout','App\Http\Controllers\CheckoutController@getCheckout')->name('getCheckout');
    Route::get('/post-checkout','App\Http\Controllers\CheckoutController@postCheckout')->name('postCheckout');
    Route::get('/getOrderdetail','App\Http\Controllers\CheckoutController@getOrderdetail')->name('getOrderdetail');

});


//paypal
Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');


//  Route::prefix('admin')->group(function () {
//     Route::get('/dashboard','App\Http\Controllers\AdminController@index')->name('dashboard');
// });

Route::middleware('role:1,2')->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/order-detail', [AdminController::class, 'orderDetail'])->name('orderDetail');


    // Route::get('/dashboard','App\Http\Controllers\AdminController@index')->name('dashboard');
    Route::prefix('account')->group(function (){
        Route::get('/list-account','App\Http\Controllers\AccountController@list_account')->name('list_account');

        Route::get('/unactive-account','App\Http\Controllers\AccountController@unactive_account')-> name('unactive_account');
        Route::get('/active-account','App\Http\Controllers\AccountController@active_account')-> name('active_account');

        Route::get('/admin-account','App\Http\Controllers\AccountController@admin_account')-> name('admin_account');
        Route::get('/user-account','App\Http\Controllers\AccountController@user_account')-> name('user_account');

        Route::get('/delete-account','App\Http\Controllers\AccountController@delete_account')-> name('delete_account');
        Route::get('/edit-account','App\Http\Controllers\AccountController@edit_account')-> name('edit_account');
        Route::post('/update-account','App\Http\Controllers\AccountController@update_account')-> name('update_account');

        Route::get('/search-account','App\Http\Controllers\AccountController@search_account')->name('search_account');
   
    });


    Route::prefix('slider')->group(function (){
        Route::get('/list-slider','App\Http\Controllers\SliderController@list_slider')->name('list_slider');
        Route::get('/delete-slider','App\Http\Controllers\SliderController@delete_slider')-> name('delete_slider');
        Route::post('/add-slider','App\Http\Controllers\SliderController@add_slider')-> name('add_slider');
        Route::get('/edit-slider','App\Http\Controllers\SliderController@edit_slider')-> name('edit_slider');
        Route::post('/update-slider','App\Http\Controllers\SliderController@update_slider')-> name('update_slider');
    });

    Route::prefix('blog')->group(function (){
        Route::get('/list-blog','App\Http\Controllers\BlogController@list_blog')->name('list_blog');
        Route::get('/delete-blog','App\Http\Controllers\BlogController@delete_blog')-> name('delete_blog');
        Route::post('/add-blog','App\Http\Controllers\BlogController@add_blog')-> name('add_blog');
        Route::get('/edit-blog','App\Http\Controllers\BlogController@edit_blog')-> name('edit_blog');
        Route::post('/update-blog','App\Http\Controllers\BlogController@update_blog')-> name('update_blog');
    });

    Route::prefix('banner')->group(function (){
        Route::get('/list-banner','App\Http\Controllers\BannerController@list_banner')->name('list_banner');
        Route::get('/delete-banner','App\Http\Controllers\BannerController@delete_banner')-> name('delete_banner');
        Route::post('/add-banner','App\Http\Controllers\BannerController@add_banner')-> name('add_banner');
        // Route::get('/edit-banner','App\Http\Controllers\BannerController@edit_banner')-> name('edit_banner');
        // Route::post('/update-banner','App\Http\Controllers\BannerController@update_banner')-> name('update_banner');
    });

    Route::prefix('category')->group(function (){
        Route::get('/list-category','App\Http\Controllers\CategoryController@list_category')->name('list_category');
        Route::post('/add-category','App\Http\Controllers\CategoryController@add_category')->name('add_category');
        Route::get('/delete-category','App\Http\Controllers\CategoryController@delete_category')-> name('delete_category');

        Route::get('/edit-category','App\Http\Controllers\CategoryController@edit_category')-> name('edit_category');
        Route::post('/update-category','App\Http\Controllers\CategoryController@update_category')-> name('update_category');

        Route::get('/reject-category','App\Http\Controllers\CategoryController@reject_category')-> name('reject_category');
        Route::get('/active-category','App\Http\Controllers\CategoryController@active_category')-> name('active_category');

        Route::get('/search-category','App\Http\Controllers\CategoryController@search_category')->name('search_category');

   
    });


    Route::prefix('product')->group(function (){
        Route::get('/list-product','App\Http\Controllers\ProductController@list_product')->name('list_product');
        Route::get('/show-product','App\Http\Controllers\ProductController@show_product')->name('show_product');
        Route::post('/add-product','App\Http\Controllers\ProductController@add_product')->name('add_product');
        Route::get('/delete-product','App\Http\Controllers\ProductController@delete_product')-> name('delete_product');

        Route::get('/edit-product','App\Http\Controllers\ProductController@edit_product')-> name('edit_product');
        Route::post('/update-product','App\Http\Controllers\ProductController@update_product')-> name('update_product');

        Route::get('/reject-product','App\Http\Controllers\ProductController@reject_product')-> name('reject_product');
        Route::get('/active-product','App\Http\Controllers\ProductController@active_product')-> name('active_product');

        Route::get('/search-product','App\Http\Controllers\ProductController@search_product')->name('search_product');
    });
    

    Route::prefix('product-attr')->group(function (){
        Route::get('/list-color','App\Http\Controllers\ProductAttrController@list_color')->name('list_color');
        Route::post('/add-color','App\Http\Controllers\ProductAttrController@add_color')->name('add_color');
        Route::get('/delete-color','App\Http\Controllers\ProductAttrController@delete_color')-> name('delete_color');

        Route::get('/list-size','App\Http\Controllers\ProductAttrController@list_size')->name('list_size');
        Route::post('/add-size','App\Http\Controllers\ProductAttrController@add_size')->name('add_size');
        Route::get('/delete-size','App\Http\Controllers\ProductAttrController@delete_size')-> name('delete_size');

        Route::get('/list-attr','App\Http\Controllers\ProductAttrController@list_attr')->name('list_attr');
        Route::get('/show-attr/{id}','App\Http\Controllers\ProductAttrController@show_attr')->name('show_attr');
        Route::post('/add-attr','App\Http\Controllers\ProductAttrController@add_attr')->name('add_attr');
        Route::get('/delete-attr','App\Http\Controllers\ProductAttrController@delete_attr')->name('delete_attr');
    });

});
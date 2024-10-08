<?php

use App\Http\Controllers\admin_controller;
use App\Http\Controllers\cart_controller;
use App\Http\Controllers\delivery_controller;
use App\Http\Controllers\product_controller;
use App\Http\Controllers\user_controller;
use App\Http\Controllers\userdata_controller;
use App\Http\Middleware\check_admin;
use App\Http\Middleware\check_auth;
use App\Http\Middleware\check_verify_email;
use App\Models\admins;
use Illuminate\Support\Facades\Route;

Route::controller(user_controller::class)->group(function(){
    Route::get('/','main')->name('main');
    
    Route::get('/login','login')->name('login');
    Route::get('/register','register')->name('register');
    Route::get('/verify','verify')->name('verify')->middleware(check_auth::class);
    Route::get('/send_verify','send_email')->name('send_token')->middleware(check_auth::class);
    Route::get('/inputemail','inputemail')->name('inputemail');
    Route::get('/verifyemail','verify_email')->name('verifyemail');
    Route::get('/reset_password','reset_password')->name('reset_password');

    Route::post('/logout','f_logout')->name('logout');
    Route::post('/f_login','f_login')->name('f_login');
    Route::post('/f_register','f_register')->name('f_register');
    Route::post('/f_verify','f_verify')->name('f_verify')->middleware(check_auth::class);
    Route::post('/f_inputemail','f_inputemail')->name('f_inputemail');
    Route::post('f_verifyemail','f_verify_email')->name('f_verify_email');
    Route::post('f_reset_password','f_reset_password')->name('f_reset_password');
});
Route::controller(userdata_controller::class)->group(function(){
    Route::get('/userdata','userdata')->name('userdata')->middleware(check_verify_email::class);
    Route::get('/view_addres','addres')->name('view_addres')->middleware(check_verify_email::class);
    Route::get('/add_addres','add_addres')->name('add_addres')->middleware(check_verify_email::class);
    Route::get('/edit_addres/{editaddres}','edit_addres')->name('edit_addres')->middleware(check_verify_email::class);
    Route::get('/delete_addres/{deleteaddres}','f_delete_addres')->name('delete_addres')->middleware(check_verify_email::class);

    Route::post('/edit_addres/{editaddres}','f_edit_addres')->name('f_edit_addres')->middleware(check_verify_email::class);
    Route::post('/userdata','f_edit')->name('f_edit')->middleware(check_verify_email::class);
    Route::post('/add_addres','f_add_addres')->name('f_add_addres')->middleware(check_verify_email::class);
});
Route::controller(product_controller::class)->group(function(){
    Route::get('/add_product','add_product')->name('admin_add_product')->middleware(check_admin::class);
    Route::get('/delete_product/{data}','delete_product')->name('delete_product')->middleware(check_admin::class);
    Route::get('/edit_product/{data}','edit_product')->name('edit_product')->middleware(check_admin::class);
    Route::post('/f_add_product','f_add_product')->name('f_add_product')->middleware(check_admin::class);
    Route::post('/f_edit_product/{data}','f_edit_product')->name('f_edit_product')->middleware(check_admin::class);
    Route::post('/f_add_quantity/{id}','f_add_quantity')->name('f_add_quantity')->middleware(check_admin::class);

    //user
    Route::get('/view_product_data/{data}','view_product')->name('product_data');
});
Route::middleware(check_auth::class)->group(function(){
    Route::controller(cart_controller::class)->group(function(){
        Route::get('/cart','view_cart')->name('cart');
        Route::get('/delete_cart/{products}','f_delete_cart')->name('f_delete_cart');
        Route::post('/add_cart','f_add_cart')->name('f_add_cart');
        Route::post('/checkout','f_checkout')->name('f_checkout');
    });
    Route::controller(delivery_controller::class)->group(function(){
        Route::get('/view_delivery','view_delivery')->name('delivery');
        Route::get('/view_product_delivery/{id}:{type}','view_delivery_product')->name('view_product_delivery');
        Route::get('/view_pickup','view_pickups')->name('view_pickup');
        Route::get('/history','history')->name('history');
        Route::get('/view_history_product/{type}','history_product')->name('history_product');
        Route::get('/components_loop_history_delivery/{type}','history_delivery')->name('history_delivery');
        Route::post('/successful_delivery','f_delivery')->name('f_delivery');
    });
});

Route::middleware(check_admin::class)->group(function(){
    Route::controller(admin_controller::class)->group(function(){
        Route::get('/s_login','login')->name('admin_login')->withoutMiddleware(check_admin::class);
        Route::get('/s_main','main')->name('admin_main');
        Route::get('/user_pickup','pickup')->name('user_pickup');

        Route::post('/f_view_pickup','f_pickup')->name('loop_pickup');
        Route::post('/f_s_login','f_login')->name('f_seller_login')->withoutMiddleware(check_admin::class);
        Route::post('/s_logout','f_logout')->name('f_s_logout');
        
    });
});

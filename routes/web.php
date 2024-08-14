<?php

use App\Http\Controllers\user_controller;
use App\Http\Controllers\userdata_controller;
use App\Http\Middleware\check_auth;
use Illuminate\Support\Facades\Route;

Route::controller(user_controller::class)->group(function(){
    Route::get('/','main')->name('main');
    Route::get('/logout','f_logout')->name('logout');
    Route::get('/login','login')->name('login');
    Route::get('/register','register')->name('register');
    Route::get('/verify','verify')->name('verify')->middleware(check_auth::class);
    Route::post('/login','f_login')->name('f_login');
    Route::post('/register','f_register')->name('f_register');
    Route::post('/verify','f_verify')->name('f_verify');
});
Route::controller(userdata_controller::class)->group(function(){
    Route::get('/userdata','userdata')->name('userdata')->middleware(check_auth::class);
    Route::get('/view_addres','addres')->name('view_addres')->middleware(check_auth::class);
    Route::get('/add_addres','add_addres')->name('add_addres')->middleware(check_auth::class);
    Route::get('/edit_addres/{editaddres}','edit_addres')->name('edit_addres')->middleware(check_auth::class);
    Route::get('/edit_addres/{editaddres}','f_edit_addres')->name('f_edit_addres')->middleware(check_auth::class);
    Route::post('/userdata','f_edit')->name('f_edit')->middleware(check_auth::class);
    Route::post('/add_addres','f_add_address')->name('f_add_addres')->middleware(check_auth::class);
});

<?php

use App\Http\Controllers\user_controller;
use Illuminate\Support\Facades\Route;

Route::controller(user_controller::class)->group(function(){
    Route::get('/','main')->name('main');
    Route::get('/logout','f_logout')->name('logout');
    Route::get('/login','login')->name('login');
    Route::get('/register','register')->name('register');
    Route::get('/verify','verify')->name('verify');
    Route::post('/login','f_login')->name('f_login');
    Route::post('/register','f_register')->name('f_regisster');
    Route::post('/verify','f_verify')->name('f_verify');
});

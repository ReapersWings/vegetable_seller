<?php

use App\Http\Controllers\user_controller;
use Illuminate\Support\Facades\Route;

Route::get('/',[user_controller::class,'main'])->name('main');
Route::get('/logout',[user_controller::class,'f_logout'])->name('logout');
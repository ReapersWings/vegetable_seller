<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class user_controller extends Controller
{
    public function main(){
        return view('main',[
            'data'=>products::paginate(6)
        ]);
    }
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function f_login(){
        
    }
    public function f_logout(){
        Auth::logout();
        return redirect()->route('login')->with('message','logout successful!');
    }
}

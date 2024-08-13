<?php

namespace App\Http\Controllers;

use App\Mail\emailverify;
use App\Models\products;
use App\Models\User;
use DateTime;
//use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class user_controller extends Controller
{
    public function verify(){
        return view('verify');
    }
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function main(){
        return view('main',[
            'data'=>products::paginate(6)
        ]);
    }
    public function f_verify(Request $request){
        $data=User::where('email','=',''.$request->email);
        $email=$data->get();
        if ($email->email_verify_token === $request->token) {
            $data->update(['email_verified_at'=>new DateTime('now')]);
            return redirect()->route('main')->with('message','Verify successful!');
        }else{
            return redirect()->route('verify')->with('message','Verify Failed');
        }
    }
    public function f_register(Request $request){
        $formregister=$request->validate([
            'name'=>['required',Rule::unique('users','name')],
            'password'=>'requred|confirmed',
            'email'=>['required',Rule::unique('users','email')]
        ]);
        Auth::login($formregister);
        $formregister['email_verify_token']=rand(100000,999999);
        Mail::to($request->email)->send(new emailverify($formregister));
        return redirect()->name('verify')->with('message','please verify your email');
    }
    public function f_login(Request $request){
        $formlogin=$request->validate([
            'name'=>'required',
            'password'=>'required'
        ]);
        if (Auth::attempt($formlogin)) {
            if (!Auth::user()->email_verified_at) {
                return redirect()->name('verify')->with('message','Please verify your email first!');
            }else{
                return redirect()->name('main')->with('message','login successful');
            }
            
        }else{
            return redirect()->name('login')->with('message','Login Failed');
        }
    }
    public function f_logout(){
        Auth::logout();
        return redirect()->route('login')->with('message','logout successful!');
    }
    //$ git commit -m 'version'
    // git push -u origin main

    //commit download git hub file
    //git clone 'link'
    //composer install
    //copy env.example and rename .env
}

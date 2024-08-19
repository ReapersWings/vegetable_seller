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
            'data'=>products::where("p_total_quantity",">","0")->paginate(6)
        ]);
    }
    public function f_verify(Request $request){
        $data=User::where('email','=',Auth::user()->email);
        $email=$data->get()->first();
        //dd($email);
        if ($email['email_verify_token'] === $request->token) {
            $data->update(['email_verified_at'=>new DateTime('now')]);
            return redirect()->route('main')->with('message','Verify successful!');
        }else{
            return redirect()->route('verify')->with('message','Verify Failed');
        }
    }
    public function f_register(Request $request){
        $formregister=$request->validate([
            'name'=>['required',Rule::unique('users','name')],
            'password'=>'required|confirmed',
            'email'=>['required',Rule::unique('users','email')]
        ]);
        $formregister['email_verify_token']=rand(100000,999999);
        $data=User::create($formregister);
        Auth::login($data);
        Mail::to($request->email)->send(new emailverify($formregister));
        return redirect()->route('verify')->with('message','please verify your email');
    }
    public function f_login(Request $request){
        $formlogin=$request->validate([
            'name'=>'required',
            'password'=>'required'
        ]);
        if (Auth::attempt($formlogin)) {
            if (!Auth::user()->email_verified_at) {
                return redirect()->route('verify')->with('message','Please verify your email first!');
            }else{
                return redirect()->route('main')->with('message','login successful');
            }
            
        }else{
            return redirect()->route('login')->with('message','Login Failed');
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

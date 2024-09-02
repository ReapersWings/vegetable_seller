<?php

namespace App\Http\Controllers;

use App\Mail\emailverify;
use App\Models\password_reset_tokens;
use App\Models\products;
use App\Models\User;
use DateTime;
//use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

date_default_timezone_set("Asia/Kuala_Lumpur");
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
    public function inputemail(){
        return view('insert_email');
    }
    public function verify_email(){
        return view('verify_email');
    }
    public function reset_password(){
        return view('reset_password');
    }
    public function main(){
        return view('main',[
            'data'=>products::where("p_total_quantity",">","0")->paginate(8)
        ]);
    }
    public function f_verify(Request $request){
        $data=password_reset_tokens::where('email','=',Auth::user()->email)->where('expire_date','>','NOW()');
        //dd($email);
        if ($email=$data->get()->first()) {
            if ($email['token']===$request->token) {
                User::where('email',Auth::user()->email)->update(['email_verified_at'=>new DateTime('now')]);
                return redirect()->route('main')->with('message','Verify successful!');
            }else{
                return redirect()->route('verify')->with('message','Verify Failed');
            }           
        }else{
            return redirect()->route('send_token');
        }
    }
    public function f_register(Request $request){
        $formregister=$request->validate([
            'name'=>['required',Rule::unique('users','name')],
            'password'=>'required|confirmed',
            'email'=>['required',Rule::unique('users','email')]
        ]);
        $data=User::create($formregister);
        Auth::login($data);
        
        return redirect()->route('verify')->with('message','please verify your email');
    }
    public function f_login(Request $request){
        $formlogin=$request->validate([
            'name'=>'required',
            'password'=>'required'
        ]);
        if (Auth::attempt($formlogin)) {
            if (!Auth::user()->email_verified_at) {
                return redirect()->route('send_token');
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
    public function send_email(){
        $token= Str::random(6);
        $expire= date('Y-m-d H:i:s' , strtotime('+5 Minutes'));
        $insert=[
            'email'=>Auth::user()->email,
            'token'=>$token,
            'expire_date'=>$expire
        ];
        password_reset_tokens::create($insert);
        Mail::to(Auth::user()->email)->send(new emailverify($insert));
        return redirect()->route('verify')->with('message','Verify the token');
    }
    public function f_inputemail(Request $request){
        $token= Str::random(6);
        $expire= date('Y-m-d H:i:s' , strtotime('+5 Minutes'));
        $insert=[
            'email'=>Auth::user()->email,
            'token'=>$token,
            'expire_date'=>$expire
        ];
        password_reset_tokens::create($insert);
        Mail::to($request->email)->send(new emailverify($insert));
        return redirect()->route('verifyemail')->with('message','please verify your email')->with('email','$request->email');
    }
    public function f_verify_email(Request $request){
        $data=password_reset_tokens::where('email','=',$request->email)->where('expire_date','>','NOW()');
        if ($email=$data->get()->first()) {
            if ($email['token']===$request->token) {
                User::where('email',$request->email)->update(['email_verified_at'=>new DateTime('now')]);
                return redirect()->route('reset_password')->with('message','please Reset your password')->with('email','$request->email');
            }else{
                return redirect()->route('verify_email')->with('message','Verify Failed');
            }           
        }else{
            return redirect()->route('verify_email')->with('message','this token have been expire or not have please send email one more!');
        }
    }
    public function f_reset_password(Request $request){
        $request->validate([
            'password'=>'required|confirmed'
        ]);
        User::where('email',$request->email)->update('password',$request->password);
        return redirect()->name('login')->with('message','Reset password successful');
    }
    //$ git commit -m 'version'
    // git push -u origin main

    //commit download git hub file
    //git clone 'link'
    //composer install
    //copy env.example and rename .env
}

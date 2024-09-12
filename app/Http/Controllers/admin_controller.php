<?php

namespace App\Http\Controllers;

use App\Models\admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admin_controller extends Controller
{
    public $faillogin ;
    public function __construct()
    {
        $this->faillogin = 1 ;
    }
    public function main(){
        return view('admin_main')->with('message','Login successful!');
    }
    public function login(){
        Auth::logout();
        if ($this->faillogin <= 3) {
            return view('admin_login');
        }else{
            return redirect()->route('login')->with('message','you cannot login seller');
        }
    }
    public function f_logout(Request $request){
        Auth::admin()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('message','logout successful');
    }
    
    public function f_login(Request $request){
        if ($this->faillogin <= 3) {
            $check=admins::where('username',$request->username)->get();
            $data = $request ->validate([
                'username'=>'required',
                'password'=>'required'
            ]);
            if (count($check)!==0) {
                if (Auth::guard('admin')->attempt($data)) {
                    return redirect()->route('admin_main');    
                }else{
                    $this->faillogin+=1 ;
                    return redirect()->route('admin_login')->with('message','Login failed');
                }
            }else{
                $this->faillogin+=1 ;
                return redirect()->route('admin_login')->with('message','Login failed');
            }
        }else{
            return redirect()->route('login')->with('message','you login failed too much time');
        }        
    }
}

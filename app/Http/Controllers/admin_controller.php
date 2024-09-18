<?php

namespace App\Http\Controllers;

use App\Models\admins;
use App\Models\products;
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
        $data = products::all();
        return view('admin_main',[
            'product'=>$data
        ]);
    }
    public function login(){
        Auth::logout();
        if ($this->faillogin <= 3) {
            return view('admin_login');
        }else{
            return redirect()->route('login');
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
            //$data['password']=bcrypt($request['password']);
            if (count($check)!==0) {
                dd([Auth::guard('admin')->user(),Auth::guard('admin')->check(),$data,Auth::guard('admin')]);
                    if (Auth::guard('admin')->attempt($data)) {
                        return redirect()->route('admin_main')->with('message','you cannot login seller');    
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

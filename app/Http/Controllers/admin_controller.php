<?php

namespace App\Http\Controllers;

use App\Models\admins;
use App\Models\carts;
use App\Models\deliverys;
use App\Models\pickups;
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
    public function pickup(){
        return view('view_user_pickup',[
            'data'=>pickups::join('carts','pickups.checkouts_id','=','carts.checkout_id')->join('products','carts.product_id','=','products.id')->where('pickups.p_state','readying')->get()
        ]);
    }
    public function f_logout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('message','logout successful');
    }
    public function view_resit($id,$pickup){
        if ($pickup === 'pickup') {
            $data =pickups::join('carts','pickups.checkouts_id','=','carts.checkout_id')
            ->join('products','carts.product_id','=','products.id')
            ->join('users','carts.user_id','=','users.id')
            ->where('pickups.checkouts_id',$id)->get();
        }else{
            $data =deliverys::join('carts','deliverys.checkouts_id','=','carts.checkout_id')
            ->join('products','carts.product_id','=','products.id')
            ->join('address','deliverys.addres_id','=','address.id')
            ->join('users','carts.user_id','=','users.id')
            ->where('deliverys.checkouts_id',$id)->get();
        }
        //dd($data);
        return view('view_user_resit',[
            'data'=>$data,
            'type'=>$pickup
        ]);
    }
    
    public function f_pickup(Request $request,$type){
        if ($type === 'pickup') {
            if ( $request->input === "") {
                $data=pickups::join('carts','pickups.checkouts_id','=','carts.checkout_id')->join('products','carts.product_id','=','products.id')->where('pickups.p_state','readying')->get();
            }else{
                $data=pickups::join('carts','pickups.checkouts_id','=','carts.checkout_id')->join('products','carts.product_id','=','products.id')->where('pickups.p_state','readying')->where('pickups.c_token_pick_up','LIKE','%'.$request->input.'%')->get();
            }
            $datapick=view('components.loop_user_pickups',['data'=>$data])->render();
            return response()->json(['data'=>$datapick]);
        } else {
            if ( $request->input === "") {
                $data=deliverys::join('carts','deliverys.checkouts_id','=','carts.checkout_id')
                ->join('products','carts.product_id','=','products.id')
                ->join('address','deliverys.addres_id','=','address.id')
                ->join('users','carts.user_id','=','users.id')->where('pickups.p_state','!=','successful')->get();
            }else{
                $data=deliverys::join('carts','deliverys.checkouts_id','=','carts.checkout_id')
                ->join('products','carts.product_id','=','products.id')
                ->join('address','deliverys.addres_id','=','address.id')
                ->join('users','carts.user_id','=','users.id')->where('pickups.p_state','!=','successful')->where('deliverys.checkouts_id','LIKE','%'.$request->input.'%')->get();
            }
            $datapick=view('components.loop_user_delivery',['data'=>$data])->render();
            return response()->json(['data'=>$datapick]);
        }
        
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
                //dd([Auth::guard('admin')->user(),Auth::guard('admin')->check(),$data,Auth::guard('admin')]);
                    if (Auth::guard('admin')->attempt($data)) {
                        return redirect()->route('admin_main')->with('message','you login successful!');    
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

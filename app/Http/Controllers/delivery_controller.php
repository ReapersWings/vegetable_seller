<?php

namespace App\Http\Controllers;

use App\Models\carts;
use App\Models\deliverys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class delivery_controller extends Controller
{
    public function view_delivery(){
        $data = deliverys::join('carts','deliverys.checjouts_id','=','carts.checkout_id')->join('address','deliverys.addres_id','=','address.id')->join('products','carts.product_id','=','products.id')->where('carts.user_id','=',Auth::id()) ;
        //dd($data->where('d_state','be_ready')->get());
        return view('view_delivery',[
            'preparing'=>[$data->where('d_state','be_ready')->get()],
            'ontheway'=>[$data->where('d_state','on_the_way')->get()]
        ]);
    }
    public function view_delivery_product($id){
        $data=deliverys::join('carts','deliverys.checjouts_id','=','carts.checkout_id')->join('products','carts.product_id','=','products.id')->where('c_id',$id)->get();
        return view('delivery_product',[
            'data'=>$data
        ]);
    }
    public function f_delivery(Request $request){
        deliverys::where('checjouts_id',$request->submit)->where('d_state','on_the_way')->update(['d_state'=>'successful']);
        return back()->with('message','This delivery have been successfull');
    }
}

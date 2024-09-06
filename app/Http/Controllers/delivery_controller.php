<?php

namespace App\Http\Controllers;

use App\Models\carts;
use App\Models\deliverys;
use App\Models\pickups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class delivery_controller extends Controller
{
    public function view_pickups(){
        $data=pickups::join('carts','pickups.checkouts_id','=','carts.checkout_id')->join('products','carts.product_id','=','products.id')->where('carts.user_id','=',Auth::id())->where('pickups.p_state','readying')->where('pickups.p_expire_date','>','NOW()')->get();
        //dd($data);
        return view('view_pickup',[
            'data'=>$data
        ]);
    }
    public function view_delivery(){
        $data = deliverys::join('carts','deliverys.checkouts_id','=','carts.checkout_id')->join('address','deliverys.addres_id','=','address.id')->join('products','carts.product_id','=','products.id')->where('carts.user_id','=',Auth::id())  ;
        //dd($data->where('d_state','be_ready')->get());
        return view('view_delivery',[
            'preparing'=>[$data->where('d_state','be_ready')->get()],
            'ontheway'=>[$data->where('d_state','on_the_way')->get()]
        ]);
    }
    public function view_delivery_product($id ,$type){
        if ($type === 'delivery') {
            $data=deliverys::join('carts','deliverys.checkouts_id','=','carts.checkout_id')->join('products','carts.product_id','=','products.id')->where('c_id',$id)->get();
        }else{
            $data=pickups::join('carts','pickups.checkouts_id','=','carts.checkout_id')->join('products','carts.product_id','=','products.id')->where('c_id',$id)->get();
        }
        return view('delivery_product',[
            'data'=>$data,
            'type'=>$type
        ]);
    }
    public function f_delivery(Request $request){
        deliverys::where('checkouts_id',$request->submit)->where('d_state','on_the_way')->update(['d_state'=>'successful']);
        return back()->with('message','This delivery have been successfull');
    }
    public function history(){
        return view('view_history');
    }
    public function history_product($type){

    }
    public function history_delivery($type){
        if ($type === 'deliverys') {
            $data = deliverys::join('carts','deliverys.checkouts_id','=','carts.checkout_id')->join('products','carts.product_id','=','products.id')->where('deliverys.d_state','successful')->join('address','deliverys.addres_id','=','address.id')->orderBy('deliverys.updated_at','desc')->get();
            $dataoutput = view('components.loop_history_delivery',['deliverys'=>$data])->render();
            return response()->json(['data'=>$dataoutput]);
        }elseif ($type ==='pickups') {
            $data = pickups::join('carts','pickups.checkouts_id','=','carts.checkout_id')->join('products','carts.product_id','=','products.id')->where('pickups.p_state','successful')->orderBy('pickups.updated_at','desc')->get();
            $dataoutput = view('components.loop_history_pickup',['pickups'=>$data])->render();
            return response()->json(['data'=>$dataoutput]);
        }else{
            $data =carts::join('products','carts.product_id','=','products.id')->where('c_state','delete')->orderBy('carts.updated_at','desc')->get();
            $dataoutput = view('components.loop_history_carts',['carts'=>$data])->render();
            return response()->json(['data'=>$dataoutput]);
        }
    }
}

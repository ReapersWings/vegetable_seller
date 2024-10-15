<?php

namespace App\Http\Controllers;

use App\Mail\emailrefund;
use App\Models\carts;
use App\Models\deliverys;
use App\Models\messages;
use App\Models\pickups;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
            'preparing'=>[$data->where('d_state','readying')->get()],
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
    public function refund($checkout_id,$type){
        $data=carts::join('products','carts.product_id','=','products.id')->where('checkout_id',$checkout_id)->get();
        Mail::to(Auth::user()->email)->send(new emailrefund($data));
        if ($type === 'delivery') {
            deliverys::where('checkouts_id',$checkout_id)->delete();
        }else{
            pickups::where('checkouts_id',$checkout_id)->delete();
        }
        $carts = carts::where('checkout_id',$checkout_id) ;
        $cartsdata=$carts->get();
        $totalprice=0 ;
        foreach ($cartsdata as $row) {
            $product=products::where('id',$row['product_id']);
            $productdata=$product->get();
            //dd($productdata);
            $changequantity = $productdata[0]['p_total_quantity']+$row['c_quantity'] ;
            $product->update(['p_total_quantity'=>$changequantity]);
            $totalprice+=$row['c_total_price'];
        }
        $carts->update(['checkout_id'=>null,'c_state'=>'delete']);
        messages::create(['user_id'=>Auth::id(),'message'=>'Refund RM'.$totalprice.' to user '.Auth::user()->phone_number]);
        return redirect()->route('history')->with('message','Refunding!');
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
        }elseif ($type ==='carts') {
            $data =carts::join('products','carts.product_id','=','products.id')->where('c_state','delete')->orderBy('carts.updated_at','desc')->get();
            $dataoutput = view('components.loop_history_cart',['carts'=>$data])->render();
            return response()->json(['data'=>$dataoutput]);
        }
    }
}

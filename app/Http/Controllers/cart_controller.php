<?php

namespace App\Http\Controllers;

use App\Mail\email_pickup;
use App\Models\address;
use App\Models\carts;
use App\Models\deliverys;
use App\Models\pickups;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class cart_controller extends Controller
{
    public function view_cart(){
        $address = address::where('user_id','=',Auth::user()->id)->get();
        $cart = carts::join('products','products.id','=','carts.product_id')->where('carts.user_id','=',Auth::user()->id)->where('c_state','=','at_cart')->get();
        //dd($cart);
        return view('view_cart',[
            'cart'=>[$cart],
            'addres'=>[$address]
        ]);
    }
    public function f_add_cart(Request $request){
        //dd($request);
        $formadd=$request->validate([
            'c_quantity'=>'required|min:1',
            'product_id'=>'required'
        ]);
        $check = carts::where('user_id','=',Auth::user()->id)->where('product_id','=',$request->product_id)->where('c_state','=','at_cart')->get();
        if (count($check) === 0) {
            $formadd['product_id']=(int)$request->product_id;
            $formadd['user_id']=Auth::user()->id;
            $formadd['c_state']='at_cart';
            carts::create($formadd);
            return redirect()->route('main')->with('message','Add Cart successful!');
        }else{
            return redirect()->route('main')->with('message','This already at cart!');
        }
        
    }
    public function f_checkout(Request $request){
        if ($request->submit < 0) {
            return back()->with('message','please add product to cart!');
        }
        $random= rand(000000001,999999999);
        if (!$request->addres && $request->checkout === "delivery") {
            return redirect()->route('view_addres')->with('message','please insert your addres!');
        }
        
        $createquerys=[];
        for ($i=0; $i <= $request->submit; $i++) {
            if ($request->input('selectcheckout'.$i)) {
                $id=explode(':',$request->input('selectcheckout'.$i));
                $createquerys=[
                    'checkout_id'=>$random,
                    'c_state'=>'checkout',
                    'c_quantity'=>$request->input("quantity".$i),
                    'c_total_price'=>$request->input("price".$i)
                ];
                carts::where('c_id','=',$id[0])->update($createquerys);
                $product = products::where('id','=',$id[1]) ;
                $getproduct = $product->get();
                $product->update(['p_total_quantity'=>$getproduct[0]['p_total_quantity'] - $request->input("quantity".$i)]);
            }   
        }
        if ($createquerys) {         
            if ($request->checkout === "delivery") {
                    deliverys::create(['checkouts_id'=>$random , 'addres_id'=>$request->addres , 'd_state'=>'be_ready']);
                    return back()->with('message','check out successful delivery is be prepare now!');          
            }else{
                $token= Str::random(6);
                pickups::create(['checkouts_id'=>$random , 'c_token_pick_up'=>$token , 'p_expire_date'=>date('Y-m-d H:i:s' , strtotime('+8 days')) , 'p_state'=>'readying']);
                $data = pickups::join('carts','pickups.checkouts_id','=','carts.checkout_id')->join('products','carts.product_id','=','products.id')->where('user_id',Auth::id())->where('p_state','readying')->where('checkouts_id',$random)->get();
                //dd($data);
                Mail::to(Auth::user()->email)->send(new email_pickup($token , $data));
                return back()->with('message','check out successful please pick up at between the date!');
            }
        }
        return back()->with('message','Please select product your need to buy from your cart');
    }
    public function f_delete_cart($products){
        carts::where('c_id','=',$products)->update(['c_state'=>'delete']);
        return back()->with('message','Delete successful!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cart_controller extends Controller
{
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
            //dd(carts::create($formadd));
            return redirect()->route('main')->with('message','Add Cart successful!');
        }else{
            return redirect()->route('main')->with('message','This already at cart!');
        }
        
    }
}

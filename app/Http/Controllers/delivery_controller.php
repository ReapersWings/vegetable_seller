<?php

namespace App\Http\Controllers;

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
            'ontheway'=>[$data->where('d_state','on_the_way')->get()],
            'history'=>[$data->where('d_state','successful')->get()]
        ]);
    }
}

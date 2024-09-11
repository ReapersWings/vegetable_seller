<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class product_controller extends Controller
{
    public function add_product(){
        return view('add_product');
    }
    public function view_product(products $data){
        return view('view_product',[
            'data'=>$data
        ]);
    }
    public function f_add_product(Request $request){
        $formaddproduct=$request->validate([
            'image'=>'required',
            'p_name'=>'required',
            'p_total_quantity'=>'required|numeric|min:10',
            'p_price'=>'required|numeric|gt:0'
        ]);
        $formaddproduct['image']=$request->file('image')->store('images',"public");
        products::create($formaddproduct);
        return back()->with('message','add vegetable Succcessful!');
    }
}
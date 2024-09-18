<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class product_controller extends Controller
{
    public function add_product(){
        return view('add_product');
    }
    public function delete_product(products $data){
        if ($data->delete()) {
            return redirect()->route('admin_main')->with('message','This product delete successful!');
        }
        return redirect()->route('admin_main')->with('message','Product delete Failed!');
    }
    public function edit_product($data){
        return view('edit_product',[
            'data'=> products::where('id',$data)->get()
        ]);
    }
    public function f_edit_product($data, Request $request){
        $editdata=$request->validate([
            'p_name'=>'required',
            'p_total_quantity'=>'required',
            'p_price'=>'required'
        ]);
        if ($request['image'] !== null) {
            $editdata['image']=$request->file('image')->store('images',"public");
        }
        products::where('id',$data)->update($editdata);
        return redirect()->route('admin_main')->with('message','Edit successful!');
    }
    public function f_add_product(Request $request){
        $formaddproduct=$request->validate([
            'image'=>'required',
            'p_name'=>'required',
            'p_total_quantity'=>'required|numeric|min:1',
            'p_price'=>'required|numeric|gt:0'
        ]);
        $formaddproduct['p_total_quantity']=$request->p_total_quantity*1000 ; 
        $formaddproduct['image']=$request->file('image')->store('images',"public");
        products::create($formaddproduct);
        return back()->with('message','add vegetable Succcessful!');
    }


    
    public function view_product(products $data){
        return view('view_product',[
            'data'=>$data
        ]);
    }
    
    
}
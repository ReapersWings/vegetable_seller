<?php

namespace App\Http\Controllers;

use App\Mail\emailverify;
use App\Models\address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class userdata_controller extends Controller
{
    public function userdata(){
        return view('userdata');
    }
    public function addres(){
        return view('view_addres',[
            'data'=>address::where('user_id','=',Auth::user()->id)->get()
        ]);
    }
    public function edit_addres(address $editaddres){
        return view('add_addres',[
            'data'=>$editaddres
        ]);
    }
    public function add_addres(){
        return view('add_addres',[
            'data'=>''
        ]);
    }
    public function f_edit(Request $request){
        $data=User::where('id','=',Auth::user()->id) ;
        $checkemail=$data->get();
        $formedit=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'f_name'=>'required',
            'l_name'=>'required',
            'gender'=>'required'
        ]);
        if ($request->input('email') !== $checkemail[0]->email) {
            $formedit['email_verified_at']=Null;
            $data->update($formedit);
            Mail::to($request->email)->send(new emailverify($formedit));
            return redirect()->route('verify')->with('message','please verify your email!');
        }else{
            $data->update($formedit);
            return redirect()->route('userdata')->with('message','edit successful');
        }
    }
    public function f_add_addres(Request $request){
        $formadd=$request->validate([
            'addres_1'=>'required',
            'addres_2'=>'required',
            'post_code'=>'required|numeric',
            'name_location'=>'required',
            'city'=>'required',
            'state'=>'required'
        ]);
        $formadd['user_id']=Auth::user()->id ;
        address::create($formadd);
        return redirect()->route('view_addres')->with('message','add address successful');
    }
    public function f_edit_addres(address $editaddres , Request $request ){
        $formedit=$request->validate([
            'address1'=>'required',
            'address2'=>'required',
            'post_code'=>'required|numeric',
            'name_location'=>'required',
            'city'=>'required',
            'state'=>'required'
        ]);
        $editaddres->update($formedit);
        return redirect()->route('view_addres')->with('message','Edit address successful');
    }
    public function f_delete_addres(address $deleteaddres){
        $deleteaddres->delete();
        return redirect()->route('view_addres')->with('message','Delete addres successful!');
    }
}

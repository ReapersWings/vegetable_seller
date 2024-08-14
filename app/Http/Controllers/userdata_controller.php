<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userdata_controller extends Controller
{
    public function userdata(){
        return view('userdata');
    }
    public function f_edit(Request $request){
        
        $formedit=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'Noic'=>'required|numeric|digits_between:12,12',
            'gender'=>'required'
        ]);
        if ($request->email === Auth::user()->email) {
            $formedit['email_verified_at']='';
        }
        
        User::where('id','=','auth()->user()->id')->update($formedit);
        return redirect()->route('verify')->with('message','please verify your email!');

    }
}

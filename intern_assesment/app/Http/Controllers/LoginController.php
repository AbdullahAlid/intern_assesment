<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function registration(){
        return view('auth.registration');
    }
    public function registerUser(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email|unique:users',
                'phone' =>'required|min:11|max:14',
                'address' => 'required',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' =>'required'
            ]
        );

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone= $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $res=$user->save();
        if($res){
            return back()->with('success','You have registered successfully. Now, login');
        }
        else{
            return back()->with('fail','Something worng'); 
        }
        
    }
    public function loginUser(Request $request){
        $request->validate(
            [  
                'email'=>'required|email',
                'password' => 'required'    
            ]
        );

        $user = User::where('email',$request->email)->first();
       
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('isAdmin',$user->isAdmin);
                $request->session()->put('loginId',$user->id);
                return redirect()->route('car.index');
            }else{
                return back()->with('fail','password not matched');
            }
           
        }
        else{
            return back()->with('fail','This email is not registered'); 
        }
    }
    public function logout(Request $request){
        if(session()->has('loginId')){
            $request->session()->flush();
            return redirect()->route('login');
        }
    }
    

}

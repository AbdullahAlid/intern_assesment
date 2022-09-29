<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }
    public function registration(){
        return view('admin.registration');
    }
    public function loggedin(Request $request){
        $request->validate(
            [  
                'email'=>'required|email',
                'password' => 'required'    
            ]
        );
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('car.index')->with('error','Admin login successfully');
        }
        else{
            return back()->with('error','Invalid email or password');
        }
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login-form')->with('success','Admin logout succeccfully');
    }
    public function registerAdmin(Request $request){
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

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone= $request->phone;
        $admin->address = $request->address;
        $admin->password = Hash::make($request->password);
        $res=$admin->save();
        if($res){
            return back()->with('success','You have registered successfully. Now, login');
        }
        else{
            return back()->with('error','Something worng'); 
        }
        
    }
    public function index()
    {
        $admins = Admin::all();
        return view('admin.index',compact('admins'));
    }
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.edit',compact('admin'));
    }
    public function update(Request $request,$id){
        $request->validate(
            [
                'name'=>'required',
                'phone' =>'required|min:11|max:14',
                'address' => 'required'
            ]
        );
        $admin = Admin::find($id);
        $admin->name=$request->name;
        $admin->phone= $request->phone;
        $admin->address = $request->address;
        $admin->update();
        return redirect()->route('admin.index');
    }
    public function delete($id)
    {
        Admin::find($id)->delete();
        return redirect()->route('admin.index');
    }
}

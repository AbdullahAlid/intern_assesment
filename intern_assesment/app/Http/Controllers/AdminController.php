<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admins.index',compact('admins'));
    }

    public function create()
    {
        return view('admins.create');
    }

    public function register(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required',
                'phone' =>'required|min:11|max:14',
                'address' => 'required',
                'username' =>'required|min:6',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' =>'required'
            ]
        );

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone= $request->phone;
        $admin->address = $request->address;
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->route('admin.index');
        
    }
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admins.edit',compact('admin'));
    }
    public function update(Request $request,$id){
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required',
                'phone' =>'required|min:11|max:14',
                'address' => 'required'
            ]
        );
        $admin = Admin::find($id);
        $admin->name=$request->name;
        $admin->email = $request->email;
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

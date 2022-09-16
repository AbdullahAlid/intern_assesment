<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index',compact('users'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit',compact('user'));
    }
    public function update(Request $request,$id){
        $request->validate(
            [
                'name'=>'required',
                'phone' =>'required|min:11|max:14',
                'address' => 'required'
            ]
        );
        $user = User::find($id);
        $user->name=$request->name;
        $user->phone= $request->phone;
        $user->address = $request->address;
        $user->update();
        return redirect()->route('user.index');
    }
    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index');
    }


}


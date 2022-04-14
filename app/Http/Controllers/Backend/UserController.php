<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::latest()->get();
        return view('admin.pages.user.index',compact('users'));

    }

    public function registation(){

        return view('admin.pages.user.registation');

    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'dof'=>'required|date',
            'city'=>'required',
            'country'=>'required',
        ]);

        User::create([
            // field name for DB || field name for form
            'name' =>$request->name,
            'email' =>$request->email,
            'password'=>bcrypt($request->password),
            'dof' =>$request->dof,
            'city' =>$request->city,
            'country' =>$request->country,
            'status' =>$request->status,

        ]);
        return redirect()->route('user.index')->with('success', 'User Register Successfully!');
    }

    public function edit($id)
    {
        $user = User::find($id);
        if ($user) {
            return view('admin.pages.user.edit',compact('user'));
        }
    }

    public function update(Request $request,$id){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'dof'=>'required|date',
            'city'=>'required',
            'country'=>'required',
        ]);

        $user = User::find($id);

        if ($user) {
            $user->update([
                'name' =>$request->name,
                'email' =>$request->email,
                'password'=>bcrypt($request->password),
                'dof' =>$request->dof,
                'city' =>$request->city,
                'country' =>$request->country,
                'status' =>$request->status,
            ]);
            return redirect()->route('user.index')->with('message', 'User Updated Successfully!');
        }
    }

    public function delete($id){

        User::find($id)->delete();
        return redirect()->route('user.index')->with('msg','User Deleted Successfully!');

    }
}
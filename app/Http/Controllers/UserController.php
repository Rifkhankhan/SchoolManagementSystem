<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView()
    {
        $users = User::all();

        return view('admin.backend.viewusers',compact('users'));
    }

    public function AddUser()
    {
        return view('admin.backend.adduser');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name'=>"required|max:255|unique:users",
            'email'=>"required|email|unique:users",
            'role'=>"required",
            'password'=>"required|unique:users"
        ],
         [  'name.required'=>"Please enter the name",
            'email.unique' => "This email is already exists",
        ] 
    );

        // User::insert([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'role'=>$request->role,
        //     'password'=>$request->password
        // ]);

        $data = new User();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;
        $data->password = bcrypt($request->password);

        $data->save();

        $notification = array(
            'message'=>"User Inserted successfully",
            'alert-type'=>'success',
        );
        
        return redirect()->route('users.view')->with($notification);
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('admin.backend.edituser',compact('user'));
    }

    public function updateUser(Request $request,$id)
    {
        $request->validate([
            'name'=>"required|max:255|unique:users",
            'email'=>"required|email|unique:users",
            'role'=>"required",
        ],
         [  'name.required'=>"Please enter the name",
            'email.unique' => "This email is already exists",
        ] 
    );
      
        User::find($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'password'=>bcrypt($request->password)
        ]);

        $notification = array(
            'message'=>"User Updated successfully",
            'alert-type'=>'info',
        );
        
        return redirect()->route('users.view')->with($notification);
    }

    public function deleteUser($id)
    {

    }
}

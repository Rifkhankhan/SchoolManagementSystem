<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileView()
    {
        $id  = Auth::user()->id;
        $user = User::find($id);

        return view('admin.backend.viewProfile',compact('user'));
    }
}

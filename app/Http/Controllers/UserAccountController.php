<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    public function create()
    {
        return inertia('UserAccount/SignUp');
    }
    public function store(Request $request)
    {
        $user =  User::make($request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|confirmed',
        ]));
        $user->save();
        Auth ::login($user);
        return redirect()->route('listings.index')->with('success','Account created successfully');
    }
}

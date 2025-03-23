<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return inertia('Auth/Login');
    }
    public function login(Request $request)
    {
        
        if(!Auth::attempt($request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]),true))
        {
            throw ValidationException::withMessages([
                'email'=> 'Authentication failed',
                'password'=> 'Authentication failed'
            ]); 
        }
        $request->session()->regenerate();
        return redirect()->intended("/listings");
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('listings.index'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login_name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('dashboard',['active' => 'dashboard']);
        }else{
            return back()->withErrors([
                'login_name' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); 
    }

     public function admin(Request $request)
    {
        $credentials = $request->validate([
            'login_name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('dashboard',['active' => 'dashboard']);
        }else{
            return back()->withErrors([
                'login_name' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }

}

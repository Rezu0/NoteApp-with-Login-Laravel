<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function indexLogin(){
        return view('dashboard.login', [
            'title' => 'Login Page!'
        ]);
    }

    public function loginExecute(Request $request){
        $credential = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:6'
        ]);

        if(Auth::attempt($credential)){
            $request->session()->regenerate();

            return redirect()->intended('/')->with('doneLogin', 'Login Succes!');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logoutExecute(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('doneLogout', 'Logout berhasil!');
    }
}

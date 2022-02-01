<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function indexRegister(){
        return view('dashboard.register', [
            'title' => "Register Page!"
        ]);
    }

    public function registerExecute(Request $request){
        $validated = $request->validate([
            'username' => 'required|max:255|min:5|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:16'
        ]);

        $validated['password'] = Hash::make($request->password);

        User::create($validated);

        return redirect('/login')->with('msgRegisSuccess', 'Register Success Silahkan Login');
    }
}

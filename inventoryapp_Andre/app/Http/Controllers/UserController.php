<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function registration() {

        return view('user.register');

    }

    public function register(Request $request) {

        $userCount = User::count();
        if($userCount == 0 ){
            $role = "admin";
        }else{
            $role = "staff";
        }
         
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $role
        ]);
        
        return redirect('/login')->with('success', 'User Registered');
    }

    public function login() {
        return view('user.login');
    }

    public function authenticate(Request $request) {

        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    public function logout(Request $request) {

        Auth::logout();

        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect('/login');

    }
}

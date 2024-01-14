<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register (Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users,email|max:255',
            'password' => 'required|string|min:6'    
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        if ($user) {
            return redirect('/login')->with('message', 'User created successfully');
        }
    }

    public function login (Request $request) {
        $credentials = [
            'email' => $request->email,    
            'password' => $request->password    
        ];

        $user = User::where('email', $credentials['email'])->first();

        if ($user) {
            if (Hash::check($credentials['password'], $user->password)) {
                session()->put('email', $user->email);
                return redirect('/')->with('message', 'You have successfully logged in');
            }
            return back()->with('error', 'Incorrect password');
        }

        return back()->with('error', 'User does not exist');
    }

    public function logout () {
        session()->forget('email');

        if (session()->has('email')) {
            return redirect('/');
        }
        
        return redirect('/login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class LoginCotroller extends Controller
{
    public function login(Request $request){
        return view('login');
    }
    public function login_req(Request $request){
        // dd($request->all());
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);



        if (Auth::attempt($credentials)) {
        // Check the user's role after successful authentication
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'user') {
            return redirect()->route('user.dashboard');
        } else {
            // If the role doesn't match, log the user out and redirect
            Auth::logout();
            return redirect('/login')->with('error', 'Unauthorized role');
        }
    }else{
            return redirect('/login');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}

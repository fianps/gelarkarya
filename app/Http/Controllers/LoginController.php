<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //make controller for login
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login',
        ]);
    }

    //make authenticate method
    public function authenticate(Request $request)
    {
        // validate data
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required|min:3|max:20'
        ]);

        //check email, password and role
        if (auth()->attempt($validatedData)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 'admin') {
                return redirect()->intended('/beranda');
            } else if (Auth::user()->role == 'penilai') {
                return redirect()->intended('/penilaian');
            } else {
                return redirect()->intended('/');
            }
        } else {
            return back()->with('loginError', 'Login gagal, periksa kembali email dan password anda!');
        }
    }

    //make logout method
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

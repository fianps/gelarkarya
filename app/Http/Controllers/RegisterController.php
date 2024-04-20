<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //make index for register
    public function index()
    {
        return view('auth.register', [
            'title' => 'Register',
        ]);
    }

    //make create method for register
    public function register(Request $request)
    {
        //validate data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:3|max:20'
        ]);

        //create new user
        $user = User::create([
            'name' => $validatedData['name'],
            'role' => 'user',
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        //login user
        auth()->login($user);

        //redirect to home
        return redirect('/');
    }
}

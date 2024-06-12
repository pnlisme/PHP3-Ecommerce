<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register', [
            'title' => 'Register',
            'active' => 'account',
        ]);
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'address' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);


        $inputs = $request->only('name', 'email', 'phone', 'address', 'password', 'password_confirmation');

        $user = User::create($inputs);
        Auth::login($user);

        return redirect()->route('login');
    }
}

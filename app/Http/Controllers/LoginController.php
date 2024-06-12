<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('login', [
            'title' => 'Login',
            'active' => 'account',
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->route('home');
        }
        return back()->withInput()->withErrors(['email' => 'Email or password is wrong.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function request(Request $request)
    {
        return view('forgot-password', [
            'title' => 'Forgot Password',
            'active' => 'account',
        ]);
    }

    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status ===  Password::RESET_LINK_SENT) {
            return back()->with('success', __($status));
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }

    public function reset(Request $request, $token)
    {
        $email = $request->email;

        return view('reset-password', [
            'title' => 'Reset Password',
            'active' => 'account',
            'token' => $token,
            'email' => $email,
        ]);
    }

    public function update(Request $request, $token)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'token' => 'required',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(40));

                $user->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('success', __($status));
        } else {
            return back()->withErrors(['email' => [__($status)]]);
        }
    }
}

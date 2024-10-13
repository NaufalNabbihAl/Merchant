<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{

    public function registerForm()
    {
        return view('merchant.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:merchants',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        Merchant::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('merchant.login');
    }
    public function loginForm()
    {
        return view('merchant.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth('merchant')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('merchant.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput(request()->except('password'));
    }

    public function dashboard()
    {
        return view('merchant.dashboard');
    }

    public function logout(Request $request)
    {
        auth('merchant')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('merchant.login');
    }
}

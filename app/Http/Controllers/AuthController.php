<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        $remember = $request->remember ? true : false;

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $remember)) {
            if (Auth::user()->terverifikasi == 0) {
                Auth::logout();
                return back()->with('error', __('auth.not_verified'));
            }

            return redirect()->intended(route('dashboard'));
        }
        if (Auth::guard('delivery')->attempt($credentials, $remember)) {
            return redirect()->intended(route('delivery.dashboard'));
        }
        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            return redirect()->intended(route('admin.dashboard'));
        }


        return back()->with('error', __('auth.failed'))->withInput($request->only('email'));
    }

    public function logout(): RedirectResponse
    {
        Auth::guard('user')->logout();
        Auth::guard('admin')->logout();
        Auth::guard('delivery')->logout();

        return to_route('login');
    }
}

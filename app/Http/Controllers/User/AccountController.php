<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AccountController extends Controller
{
    public function index(): View
    {
        return view('pages.user.settings', [
            'divisions' => Division::all(),
            'user' => auth('user')->user(),
        ]);
    }

    public function updateAccount(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama' => ['required'],
            'email' => ['required', 'email'],
            'division_id' => ['required'],
        ]);

        $user = User::find(auth('user')->user()->id);

        $user->update($data);

        return redirect()->back()->with('success', __('strings.profile_updated'));
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);

        $data['password'] = bcrypt($data['password']);

        if (!auth('user')->user()->checkPassword($data['old_password'])) {
            return redirect()->back()->with('error', __('passwords.old_password_incorrect'));
        }

        $user = User::find(auth('user')->user()->id);

        $user->update($data);

        return redirect()->back()->with('success', __('passwords.updated'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(): View
    {
        return view('pages.admin.settings', [
            'user' => auth('admin')->user(),
        ]);
    }

    public function updateAccount(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama' => ['required'],
            'email' => ['required', 'email'],
        ]);

        $user = Admin::find(auth('admin')->user()->id);

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

        if (!auth('admin')->user()->checkPassword($data['old_password'])) {
            return redirect()->back()->with('error', __('passwords.old_password_incorrect'));
        }

        $user = Admin::find(auth('admin')->user()->id);

        $user->update($data);

        return redirect()->back()->with('success', __('passwords.updated'));
    }
}

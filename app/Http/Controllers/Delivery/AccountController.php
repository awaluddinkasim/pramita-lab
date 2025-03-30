<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\DeliveryPerson;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(): View
    {
        return view('pages.delivery.settings', [
            'user' => auth('delivery')->user(),
        ]);
    }

    public function updateAccount(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama' => ['required'],
            'email' => ['required', 'email'],
        ]);

        $user = DeliveryPerson::find(auth('delivery')->user()->id);

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

        if (!auth('delivery')->user()->checkPassword($data['old_password'])) {
            return redirect()->back()->with('error', __('passwords.old_password_incorrect'));
        }

        $user = DeliveryPerson::find(auth('delivery')->user()->id);

        $user->update($data);

        return redirect()->back()->with('success', __('passwords.updated'));
    }
}

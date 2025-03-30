<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('pages.admin.admin', [
            'admins' => Admin::paginate(10),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
        ]);

        $data['password'] = bcrypt($data['password']);

        Admin::create($data);

        return back()->with('success', __('account.admin_created'));
    }

    public function edit(Admin $admin): View
    {
        return view('pages.admin.admin-edit', [
            'user' => $admin,
        ]);
    }

    public function update(Request $request, Admin $admin): RedirectResponse
    {
        $data = $request->validate([
            'nama' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['nullable', 'confirmed'],
        ]);

        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $admin->update($data);

        return to_route('admin.account.admin.index')->with('success', __('account.admin_updated'));
    }

    public function destroy(Admin $admin): RedirectResponse
    {
        $admin->delete();

        return back()->with('success', __('account.admin_deleted'));
    }
}

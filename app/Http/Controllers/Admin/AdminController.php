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

        return back()->with('success', 'Admin berhasil ditambahkan');
    }

    public function destroy(Admin $admin): RedirectResponse
    {
        $admin->delete();

        return back()->with('success', 'Admin berhasil dihapus');
    }
}

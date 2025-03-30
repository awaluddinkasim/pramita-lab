<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function pending(): View
    {
        return view('pages.admin.user-pending', [
            'users' => User::where('terverifikasi', false)->paginate(10),
        ]);
    }

    public function verified(): View
    {
        return view('pages.admin.user-verified', [
            'divisions' => Division::all(),
            'users' => User::where('terverifikasi', true)->paginate(10),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
            'division_id' => ['required'],
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['terverifikasi'] = true;

        User::create($data);

        return back()->with('success', 'User berhasil ditambahkan');
    }

    public function edit(User $user): View
    {
        return view('pages.admin.user-edit', [
            'divisions' => Division::all(),
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'nama' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['nullable', 'confirmed'],
            'division_id' => ['required'],
        ]);

        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return to_route('admin.user.active')->with('success', 'User berhasil diupdate');
    }

    public function verify(User $user): RedirectResponse
    {
        $user->update([
            'terverifikasi' => true,
        ]);

        return back()->with('success', 'User berhasil diverifikasi');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return back()->with('success', 'User berhasil dihapus');
    }
}

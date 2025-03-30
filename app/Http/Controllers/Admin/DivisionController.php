<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DivisionController extends Controller
{
    public function index(): View
    {
        return view('pages.admin.division', [
            'divisions' => Division::withCount('users')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama' => 'required',
        ]);

        Division::create($data);

        return to_route('admin.division.index')->with('success', __('division.created'));
    }

    public function destroy(Division $division): RedirectResponse
    {
        $division->delete();

        return to_route('admin.division.index')->with('success', __('division.deleted'));
    }
}

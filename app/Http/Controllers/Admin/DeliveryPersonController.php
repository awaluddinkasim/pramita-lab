<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryPerson;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DeliveryPersonController extends Controller
{
    public function index(): View
    {
        return view('pages.admin.delivery-people', [
            'deliveryPeople' => DeliveryPerson::paginate(10),
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

        DeliveryPerson::create($data);

        return back()->with('success', __('account.delivery_person_created'));
    }

    public function edit(DeliveryPerson $deliveryPerson): View
    {
        return view('pages.admin.delivery-person-edit', [
            'user' => $deliveryPerson,
        ]);
    }

    public function update(Request $request, DeliveryPerson $deliveryPerson): RedirectResponse
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

        $deliveryPerson->update($data);

        return to_route('admin.account.delivery-person.index')->with('success', __('account.delivery_person_updated'));
    }

    public function destroy(DeliveryPerson $deliveryPerson): RedirectResponse
    {
        $deliveryPerson->delete();

        return back()->with('success', __('account.delivery_person_deleted'));
    }
}

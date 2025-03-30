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

        return back()->with('success', 'Delivery person created successfully');
    }

    public function destroy(DeliveryPerson $deliveryPerson): RedirectResponse
    {
        $deliveryPerson->delete();

        return back()->with('success', 'Delivery person deleted successfully');
    }
}

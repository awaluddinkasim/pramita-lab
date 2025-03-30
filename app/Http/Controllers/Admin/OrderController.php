<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        return view('pages.admin.orders', [
            'orders' => Order::paginate(10),
        ]);
    }

    public function show(Order $order): View
    {
        return view('pages.admin.order-detail', [
            'order' => $order,
        ]);
    }

    public function edit(Order $order): View
    {
        return view('pages.admin.order-edit', [
            'order' => $order,
            'users' => User::where('terverifikasi', true)->get(),
        ]);
    }

    public function update(Request $request, Order $order): RedirectResponse
    {
        $data = $request->validate([
            'user_id' => ['required'],
            'tujuan' => ['required'],
            'detail' => ['required'],
        ]);

        if ($order->user_id !== $data['user_id']) {
            $data['divisi'] = User::find($data['user_id'])->divisi->nama;
        }

        $order->update($data);

        return to_route('admin.orders')->with('success', __('order.updated'));
    }
}

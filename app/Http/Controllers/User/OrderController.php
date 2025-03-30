<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        return view('pages.user.orders', [
            'orders' => Order::where('user_id', auth('user')->user()->id)->paginate(10),
        ]);
    }

    public function new(): View
    {
        $currentOrder = Order::doesntHave('delivery')->where('user_id', auth('user')->user()->id)->first();

        $hasOrder = $currentOrder && !$currentOrder->delivery?->selesai ?? false;

        return view('pages.user.new-order', [
            'hasOrder' => $hasOrder,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'tujuan' => ['required'],
            'detail' => ['required'],
        ]);

        $data['user_id'] = auth('user')->user()->id;
        $data['divisi'] = auth('user')->user()->divisi->nama;

        Order::create($data);

        return to_route('orders')->with('success', __('order.created'));
    }

    public function show(Order $order): View
    {
        return view('pages.user.order-detail', [
            'order' => $order,
        ]);
    }

    public function cancel(Order $order): RedirectResponse
    {
        if ($order->delivery) {
            return back()->with('error', __('order.processing'));
        }

        $order->delete();

        return back()->with('success', __('order.cancelled'));
    }
}

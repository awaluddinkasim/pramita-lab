<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
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
}

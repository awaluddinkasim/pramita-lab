<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('pages.user.dashboard', [
            'totalOrders' => Order::where('user_id', auth('user')->user()->id)->count(),
            'pendingOrders' => Order::where('user_id', auth('user')->user()->id)->doesntHave('delivery')->count(),
            'deliveredOrders' => Order::where('user_id', auth('user')->user()->id)->has('delivery')->count(),
        ]);
    }
}

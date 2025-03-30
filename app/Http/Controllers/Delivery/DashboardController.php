<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDelivery;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('pages.delivery.dashboard', [
            'hasActiveOrder' => auth('delivery')->user()->delivery ?? false,
            'availableOrders' => Order::doesntHave('delivery')->count(),
            'totalDeliveries' => OrderDelivery::where('delivery_person_id', auth('delivery')->user()->id)->count(),
        ]);
    }
}

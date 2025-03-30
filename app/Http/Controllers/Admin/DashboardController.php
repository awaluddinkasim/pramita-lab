<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryPerson;
use App\Models\Division;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('pages.admin.dashboard', [
            'deliveryPeople' => DeliveryPerson::count(),
            'divisions' => Division::count(),
            'newUsers' => User::where('terverifikasi', false)->count(),
            'activeUsers' => User::where('terverifikasi', true)->count(),
            'pendingOrders' => Order::doesntHave('delivery')->count(),
        ]);
    }
}

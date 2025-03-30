<?php

namespace App\Http\Controllers\Delivery;

use App\Events\OrderDelivered;
use App\Events\OrderTaken;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDelivery;
use App\Traits\ImageUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    use ImageUpload;

    public function active(): View
    {
        return view('pages.delivery.active-order', [
            'delivery' => auth('delivery')->user()->delivery,
        ]);
    }

    public function selesai(Request $request): RedirectResponse
    {
        $request->validate([
            'delivery_id' => ['required'],
            'foto_pengiriman' => ['required', 'image'],
        ]);

        $image = $request->file('foto_pengiriman');

        $delivery = OrderDelivery::find($request->delivery_id);
        $delivery->foto_pengiriman = $this->uploadImage('pengiriman', $image);
        $delivery->waktu_selesai = now();
        $delivery->update();

        OrderDelivered::dispatch($delivery);

        return to_route('delivery.history')->with('success', __('order.delivered'));
    }

    public function list(): View
    {
        return view('pages.delivery.orders', [
            'orders' => Order::doesntHave('delivery')->paginate(10),
        ]);
    }

    public function take(Order $order): RedirectResponse
    {
        if (auth('delivery')->user()->delivery) {
            return back()->with('error', __('order.has_delivery'));
        }

        if ($order->delivery) {
            return back()->with('error', __('order.not_available'));
        }

        $delivery = OrderDelivery::create([
            'order_id' => $order->id,
            'delivery_person_id' => auth('delivery')->user()->id,
            'nama_petugas' => auth('delivery')->user()->nama,
        ]);

        OrderTaken::dispatch($order, $delivery);

        return to_route('delivery.active-order')->with('success', __('order.taken'));
    }

    public function history(): View
    {
        $deliveries = OrderDelivery::where('delivery_person_id', auth('delivery')->user()->id)->where('waktu_selesai', '!=', null)->get();

        return view('pages.delivery.history', [
            'orders' => Order::whereIn('id', $deliveries->pluck('order_id'))->paginate(10),
        ]);
    }

    public function show(Order $order): View
    {
        return view('pages.delivery.history-detail', [
            'order' => $order,
        ]);
    }
}

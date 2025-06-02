<?php

namespace App\Listeners;

use App\Events\OrderSubmitted;
use App\Mail\OrderSubmittedMail;
use App\Models\DeliveryPerson;
use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderSubmittedMail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderSubmitted $event): void
    {
        $pendingOrders = Order::doesntHave('delivery')->count();

        $deliveryPeople = DeliveryPerson::all();

        Mail::to($deliveryPeople)->send(new OrderSubmittedMail($event->order, $pendingOrders));
    }
}

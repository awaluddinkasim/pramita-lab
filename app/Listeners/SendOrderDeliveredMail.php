<?php

namespace App\Listeners;

use App\Events\OrderDelivered;
use App\Mail\OrderDeliveredMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderDeliveredMail
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
    public function handle(OrderDelivered $event): void
    {
        Mail::to($event->delivery->order->user->email)->send(new OrderDeliveredMail($event->delivery->order, $event->delivery));
    }
}

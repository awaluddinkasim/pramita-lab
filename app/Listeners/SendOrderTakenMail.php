<?php

namespace App\Listeners;

use App\Events\OrderTaken;
use App\Mail\OrderTakenMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderTakenMail
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
    public function handle(OrderTaken $event): void
    {
        Mail::to($event->order->user->email)->send(new OrderTakenMail($event->order, $event->delivery));
    }
}

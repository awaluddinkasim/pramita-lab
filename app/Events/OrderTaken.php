<?php

namespace App\Events;

use App\Models\Order;
use App\Models\OrderDelivery;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderTaken
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;
    public $delivery;

    /**
     * Create a new event instance.
     */
    public function __construct(Order $order, OrderDelivery $delivery)
    {
        $this->order = $order;
        $this->delivery = $delivery;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}

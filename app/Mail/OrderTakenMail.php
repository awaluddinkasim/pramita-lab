<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\OrderDelivery;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderTakenMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $order;
    public $delivery;

    /**
     * Create a new message instance.
     */
    public function __construct(Order $order, OrderDelivery $delivery)
    {
        $this->user = $order->user;
        $this->order = $order;
        $this->delivery = $delivery;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notifikasi Permintaan Pengiriman',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.order-taken',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDelivery extends Model
{
    protected $fillable = [
        'order_id',
        'delivery_person_id',
        'nama_petugas',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function deliveryPerson(): BelongsTo
    {
        return $this->belongsTo(DeliveryPerson::class);
    }

    public function selesai(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->waktu_selesai ? true : false,
        );
    }
}

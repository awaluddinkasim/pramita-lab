<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DeliveryPerson extends Authenticatable
{
    protected $fillable = [
        'nama',
        'email',
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function delivery(): HasOne
    {
        return $this->hasOne(OrderDelivery::class, 'delivery_person_id')->where('waktu_selesai', null);
    }

    public function checkPassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}

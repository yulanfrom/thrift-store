<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable = [
    'user_id',
    'receiver_name',
    'phone',
    'address',
    'quantity',
    'payment_method',
    'courier',
    'payment_status',
    'total',
    'status',
    'notes',
    'delivery_proof',
    'transfer_proof'
];
    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
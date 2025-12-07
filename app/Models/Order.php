<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'address_id',
        'status',
        'subtotal',
        'tax',
        'total',
        'payment_method'
    ];
    
    protected $casts = [
        'subtotal' => 'decimal:2',
        'tax' => 'decimal:2',
        'total' => 'decimal:2'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    
    // Accesor para productos del pedido
    public function getProductsAttribute()
    {
        return $this->orderDetails->map(function ($detail) {
            return [
                'product' => $detail->producto,
                'quantity' => $detail->quantity,
                'unit_price' => $detail->unit_price
            ];
        });
    }
}
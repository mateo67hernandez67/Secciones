<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    
    // Para PK compuesta
    public $incrementing = false;
    protected $primaryKey = null;
    
    protected $fillable = [
        'order_id',
        'producto_id',
        'quantity',
        'unit_price',
        'subtotal'
    ];
    
    protected $casts = [
        'unit_price' => 'decimal:2',
        'subtotal' => 'decimal:2'
    ];
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
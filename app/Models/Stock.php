<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock'; // ← Esto es crucial

    protected $fillable = [
        'producto_id',
        'quantity'
    ];
    
    // Relación con Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
    
    // Accesor para saber si hay bajo stock
    public function getLowStockAttribute()
    {
        return $this->quantity < 10; // Umbral de 10 unidades
    }
    
    // Accesor para estado de stock
    public function getStockStatusAttribute()
    {
        if ($this->quantity <= 0) {
            return 'Agotado';
        } elseif ($this->quantity < 10) {
            return 'Bajo Stock';
        } else {
            return 'Disponible';
        }
    }
}
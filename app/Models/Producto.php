<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    
    protected $fillable = [
        'category_id',
        'nombre',
        'descripcion',
        'precio',
        'foto',
        'image',
        'gallery_images',
        'brand'
    ];
    
    protected $casts = [
        'precio' => 'decimal:2',
        'gallery_images' => 'array'
    ];
    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'category_id');
    }
    
    // 🔹 NUEVA RELACIÓN con Stock
    public function stock()
    {
        return $this->hasOne(Stock::class, 'producto_id');
    }
    
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'producto_id');
    }
    
    public function providers()
    {
        return $this->belongsToMany(Provider::class, 'product_provider', 'producto_id', 'provider_id')
                    ->withPivot('quantity', 'date')
                    ->withTimestamps();
    }
    
    // 🔹 Accesor para obtener cantidad desde stock
    public function getStockQuantityAttribute()
    {
        return $this->stock ? $this->stock->quantity : 0;
    }
    
    // 🔹 Accesor para verificar disponibilidad
    public function getIsAvailableAttribute()
    {
        return $this->stock_quantity > 0;
    }
}
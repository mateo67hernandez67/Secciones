<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'name',
        'contact_name',
        'phone',
        'email',
        'address',
        'city',
        'department'
    ];
    
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'product_provider', 'provider_id', 'producto_id')
                    ->withPivot('quantity', 'date')
                    ->withTimestamps();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'contact_name',
        'contact_phone',
        'address',
        'city',
        'department',
        'reference'
    ];
    
    // Relación con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Relación con Orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
    // Accesor para dirección completa
    public function getFullAddressAttribute()
    {
        return "{$this->address}, {$this->city}, {$this->department}";
    }
}

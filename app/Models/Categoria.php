<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categories';
    
    protected $fillable = ['name', 'description'];
    
    public function productos()
    {
        return $this->hasMany(Producto::class, 'category_id');
    }
}

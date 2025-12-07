<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity')->default(0);
            $table->foreignId('producto_id')->constrained('productos');  // 🔹 CORREGIDO: 'product_id' → 'producto_id'
            $table->timestamps();
            
            // Asegurar que un producto solo tenga un registro de stock
            $table->unique('producto_id');
            
            $table->index('producto_id', 'fk_stock_producto_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock');
    }
};
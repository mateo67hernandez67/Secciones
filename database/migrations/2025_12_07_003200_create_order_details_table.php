<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('producto_id')->constrained('productos');  // Cambié de product_id a producto_id
            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
            
            // PK compuesta
            $table->primary(['order_id', 'producto_id']);
            
            $table->index('producto_id', 'fk_order_has_product_product1_idx');
            $table->index('order_id', 'fk_order_has_product_order1_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
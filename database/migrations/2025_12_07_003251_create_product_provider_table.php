<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_provider', function (Blueprint $table) {
            $table->foreignId('producto_id')->constrained('productos');  // Cambié de product_id a producto_id
            $table->foreignId('provider_id')->constrained('providers');
            $table->integer('quantity');
            $table->date('date');
            
            // PK compuesta
            $table->primary(['producto_id', 'provider_id']);
            
            $table->index('provider_id', 'fk_product_has_provider_provider1_idx');
            $table->index('producto_id', 'fk_product_has_provider_product1_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_provider');
    }
};
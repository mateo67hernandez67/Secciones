<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('contact_name', 100);
            $table->string('contact_phone', 15);
            $table->text('address');
            $table->string('city', 50);
            $table->string('department', 50);
            $table->text('reference')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
            
            $table->index('user_id', 'fk_address_user1_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
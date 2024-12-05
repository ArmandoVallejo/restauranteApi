<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_dishes', function (Blueprint $table) {
            $table->foreignId('cart_id')->constrained('carts','cart_id')->onDelete('cascade');
            $table->foreignId('dish_id')->constrained('dishes','dish_id')->onDelete('cascade');
            $table->integer('quantity');
            $table->primary(['cart_id', 'dish_id']);
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_dishes');
    }
};

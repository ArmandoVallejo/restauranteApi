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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id('dish_id');
            $table->string('name',150);
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('ingredients',255)->nullable();
            $table->string('dish_image',255);
            $table->integer('preparation_time')->nullable();
            $table->foreignId('category_id')->constrained('categories','category_id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};

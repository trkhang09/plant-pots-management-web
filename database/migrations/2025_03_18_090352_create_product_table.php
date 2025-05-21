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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code', 8);
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->text('image');
            $table->foreignId('plant')->constrained('plants')->onDelete('cascade');
            $table->foreignId('pot')->constrained('pots')->onDelete('cascade');
            $table->foreignId('status')->constrained('statuses')->onDelete('restrict')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

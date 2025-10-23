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
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('country_id')->constrained()->cascadeOnDelete(); // ÖNÜMIŇ ÝURDY
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->float('price');
            $table->boolean('is_discount')->default(false);
            $table->integer('discount_percent')->default(0);
            $table->string('image')->nullable();
            $table->boolean('is_new')->default(false);
            $table->boolean('is_stock')->default(true);
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

<?php

use SteelAnts\LaravelBoilerplate\Warehouse\Models\Category;
use SteelAnts\LaravelBoilerplate\Warehouse\Models\Seller;
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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description')->nullable()->default('');
            $table->string('identifier')->default('');
            $table->string('sku')->default('');
            $table->string('ean', 13)->default('');
            $table->foreignIdFor(Category::class)->nullable()->default(null)->constrained();
            $table->integer('vat_rate')->nullable()->default(21);
            $table->foreignIdFor(Seller::class)->constrained();
            $table->decimal('price', 10, 2);
            $table->decimal('price_no_vat', 10, 2);
            $table->string('currency', 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};


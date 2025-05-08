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
        Schema::create('product_cart', function (Blueprint $table) {
            $table->foreignId("pc_cart_id")
                        ->references("cart_id")
                        ->on("carts");
            $table->foreignId("pc_product_id")
                        ->references('product_id')
                        ->on('products');
            $table->primary(['pc_cart_id', 'pc_product_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_cart');
    }
};

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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('produk_id');
            $table->foreignId('produk_id')->constrained('produk');
            // $table->unsignedBigInteger('pesanan_id');
            $table->foreignId('order_id')->constrained('order');
            $table->integer('qty');
            $table->integer('subtotal');
            $table->enum('review',['reviewed','unreviewed'])->default('unreviewed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};

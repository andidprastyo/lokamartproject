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
        Schema::create('review', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_customer')->constrained('users')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_produk')->constrained('produk')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_order_detail')->constrained('order_details')->onDelete('restrict')->onUpdate('cascade');
            $table->float('rating');
            $table->String('komentar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review');
    }
};

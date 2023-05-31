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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_owner')->constrained('users')->onDelete('restrict')->onUpdate('cascade');
            $table->string('nama_produk');
            $table->text('desk_produk');
            $table->tinyInteger('stok_produk');
            $table->Integer('harga_produk');
            $table->string('gambar_produk')->nullable();
            $table->string('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};

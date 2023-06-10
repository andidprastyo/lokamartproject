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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_shipper')->constrained('shipper')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_payment')->constrained('payment')->onDelete('restrict')->onUpdate('cascade');
            $table->string('nama_penerima');
            $table->string('notelp_penerima');
            $table->string('catatan_order');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('detail_alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};

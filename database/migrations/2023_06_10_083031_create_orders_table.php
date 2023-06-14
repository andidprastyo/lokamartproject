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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('total');
            $table->string('nama_penerima')->nullable();;
            $table->string('notelp_penerima')->nullable();;
            $table->string('catatan_order')->nullable();;
            $table->string('provinsi')->nullable();;
            $table->string('kota')->nullable();;
            $table->string('kecamatan')->nullable();;
            $table->string('kelurahan')->nullable();;
            $table->string('detail_alamat')->nullable();
            $table->enum('status',['keranjang','checkout'])->default('keranjang');
            $table->enum('paid',['paid','unpaid'])->default('unpaid');
            $table->text('token')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

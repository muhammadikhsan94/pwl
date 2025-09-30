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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_pengguna');
            $table->dateTime('tanggal_penjualan');
            $table->integer('jumlah')->unsigned();
            $table->decimal('total_harga', 15, 2);
            $table->integer('id_pembayaran')->unsigned();
            $table->integer('id_pengiriman')->unsigned();
            $table->char('status', 1)->default('0'); // 0: menunggu persetujuan, 1: dikemas, 2: dikirim, 3: diterima, 4: dibatalkan
            $table->timestamps();
            $table->char('soft_delete', 1)->default('0');
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();

            $table->foreign('id_pengguna')->references('id')->on('pengguna')->onDelete('restrict');
            $table->foreign('id_pembayaran')->references('id')->on('pembayaran')->onDelete('restrict');
            $table->foreign('id_pengiriman')->references('id')->on('pengiriman')->onDelete('restrict');
            $table->foreign('created_by')->references('id')->on('pengguna')->onDelete('restrict');
            $table->foreign('updated_by')->references('id')->on('pengguna')->onDelete('restrict');
            $table->foreign('deleted_by')->references('id')->on('pengguna')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};

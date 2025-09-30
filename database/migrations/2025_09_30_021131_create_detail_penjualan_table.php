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
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_penjualan');
            $table->uuid('id_produk');
            $table->integer('jumlah')->unsigned();
            $table->timestamps();
            $table->char('soft_delete', 1)->default('0');
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();

            $table->foreign('id_penjualan')->references('id')->on('penjualan')->onDelete('restrict');
            $table->foreign('id_produk')->references('id')->on('produk')->onDelete('restrict');
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
        Schema::dropIfExists('detail_penjualan');
    }
};

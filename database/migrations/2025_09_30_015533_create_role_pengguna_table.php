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
        Schema::create('role_pengguna', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('id_pengguna');
            $table->integer('id_role')->unsigned();
            $table->timestamps();

            $table->foreign('id_pengguna')->references('id')->on('pengguna')->onDelete('restrict');
            $table->foreign('id_role')->references('id')->on('role')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_pengguna');
    }
};

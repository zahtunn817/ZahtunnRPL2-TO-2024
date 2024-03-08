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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_transaksi');
            $table->double('total_harga');
            $table->enum('metode_pembayaran', ['Tunai', 'Debit']);
            $table->string('keterangan')->nullable();
            $table->unsignedBigInteger('pelanggan_id');
            $table->foreign('pelanggan_id')->references('id')->on('pelanggan');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};

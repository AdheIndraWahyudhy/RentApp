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
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('mobilID');
            $table->string('paket');
            $table->dateTime('tanggalDiambil');
            $table->dateTime('tanggalDikembalikan');
            $table->decimal('biaya', 10, 2);
            $table->enum('status', ['menunggu konfirmasi', 'dikonfirmasi', 'dibatalkan'])->default('menunggu konfirmasi');
            $table->timestamps();
            
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('mobilID')->references('id')->on('mobil')->onDelete('cascade');
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

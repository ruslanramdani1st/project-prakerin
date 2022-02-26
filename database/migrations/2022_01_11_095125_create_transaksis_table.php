<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('penumpang_id');
            $table->string('bank_pengirim');
            $table->string('bank_tujuan');
            $table->string('nama_rekening');
            $table->string('nomor_rekening');
            $table->integer('jumlah_transfer');
            $table->string('proses_pembayaran')->default("Sedang Proses");
            $table->string('bukti_pembayaran');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('penumpang_id')->references('id')->on('penumpangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeretasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keretas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_polisi');
            $table->string('nama_kereta');
            $table->date('tanggal_berangkat');
            $table->foreignId('asal_id');
            $table->foreignId('tujuan_id');
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('asal_id')->references('id')->on('asals')->onDelete('cascade');
            $table->foreign('tujuan_id')->references('id')->on('tujuans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keretas');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenumpangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penumpangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->date('tanggal_berangkat');
            $table->string('jumlah_penumpang');
            $table->foreignId('kereta_id');
            $table->foreignId('asal_id');
            $table->foreignId('tujuan_id');
            $table->string('kelas');
            $table->timestamps();

            $table->foreign('kereta_id')->references('id')->on('keretas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('penumpangs');
    }
}

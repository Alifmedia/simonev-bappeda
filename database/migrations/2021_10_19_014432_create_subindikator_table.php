<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubIndikatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indikator', function (Blueprint $table) {
            $table->bigIncrements('indi_id');
            $table->string('indi_item');
            $table->unsignedBigInteger('aspek_id');
            $table->string('fokus');
            $table->string('kegiatan');
            $table->string('satuan');
            $table->string('keterangan');
            $table->foreign('aspek_id')->references('aspek_id')->on('aspek_soal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indikators');
        Schema::rename($indikator, $to);
    }
}
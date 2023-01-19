<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabanSubinKecamatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_indi_kecamatan', function (Blueprint $table) {
            $table->unsignedBigInteger('kecamatan_id');
            $table->unsignedBigInteger('indi_id');
            $table->primary(['kecamatan_id', 'indi_id']);
            $table->string('jawab_kec');
            $table->string('jawab_tapem');
            $table->unsignedBigInteger('nilai_tapem');
            $table->string('lokasi_file');


            $table->foreign('indi_id')->references('indi_id')->on('indikator');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_subin_kecamatans');
    }
}

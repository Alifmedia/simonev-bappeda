<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabanSoalKecamatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_soal_kecamatan', function (Blueprint $table) {
            $table->unsignedBigInteger('kecamatan_id');
            $table->unsignedBigInteger('soal_id');
            $table->primary(['kecamatan_id', 'soal_id']);
            $table->unsignedBigInteger('jawaban_id');

            $table->foreign('soal_id')
                  ->references('id')->on('soal');
            $table->foreign('jawaban_id')
                  ->references('id')->on('jawaban');
            $table->foreign('kecamatan_id')
                  ->references('id')->on('kecamatan');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_soal_kecamatans');
    }
}

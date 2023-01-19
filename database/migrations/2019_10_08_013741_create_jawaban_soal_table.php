<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabanSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_soal', function (Blueprint $table) {
            $table->unsignedBigInteger('soal_id');
            $table->unsignedBigInteger('jawaban_id');
            $table->primary(['jawaban_id', 'soal_id']);

            $table->foreign('jawaban_id')
                  ->references('id')->on('jawaban');
            $table->foreign('soal_id')
                  ->references('id')->on('soal');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_soals');
    }
}

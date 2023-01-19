<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerjadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terjadwal', function (Blueprint $table) {
            $table->unsignedBigInteger('konsultasi_id')->unique();
            $table->unsignedBigInteger('administrator_id')->nullable();
            $table->unsignedBigInteger('ruang_id')->nullable();

            $table->foreign('konsultasi_id')
                  ->references('id')->on('konsultasi')
                  ->onDelete('cascade');
            $table->foreign('administrator_id')
                  ->references('id')->on('administrator')
                  ->onDelete('set null');
            $table->foreign('ruang_id')
                  ->references('id')->on('ruang')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terjadwals');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurnalKonsultasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal_konsultasi', function (Blueprint $table) {
            $table->unsignedBigInteger('konsultasi_id');
            $table->unsignedBigInteger('status_konsultasi_id');
            $table->primary(['konsultasi_id', 'status_konsultasi_id']);
            $table->unsignedBigInteger('administrator_id')->nullable();
            $table->timestamp('waktu')->nullable();
            $table->unsignedInteger('jumlah_delegasi')->nullable();
            $table->timestamps();

            $table->foreign('konsultasi_id')
                  ->references('id')->on('konsultasi')
                  ->onDelete('cascade');
            $table->foreign('status_konsultasi_id')
                  ->references('id')->on('status_konsultasi');
            // $table->foreign('variabel_konsultasi_id')
            //       ->references('id')->on('variabel_konsultasi')
            //       ->onDelete('set null');
            $table->foreign('administrator_id')
                  ->references('id')->on('administrator')
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
        Schema::dropIfExists('jurnal_konsultasis');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGampongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gampong', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kemukiman_id');
            $table->string('nama');

            $table->foreign('kemukiman_id')
                  ->references('id')->on('kemukiman');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gampongs');
    }
}

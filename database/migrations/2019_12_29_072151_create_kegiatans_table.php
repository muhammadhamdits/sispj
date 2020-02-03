<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode');
            $table->string('nama');
            $table->bigInteger('program_id')->unsigned()->index();
            $table->string('lokasi');
            $table->string('capaian_tok')->nullable();
            $table->string('capaian_tk')->nullable();
            $table->string('keluaran_tok')->nullable();
            $table->string('keluaran_tk')->nullable();
            $table->string('hasil_tok')->nullable();
            $table->string('hasil_tk')->nullable();
            $table->unique(['kode', 'program_id']);
            $table->foreign('program_id')->references('id')->on('programs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatans');
    }
}

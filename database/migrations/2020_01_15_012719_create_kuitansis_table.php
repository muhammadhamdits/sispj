<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuitansisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuitansis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal');
            $table->string('terima_dari');
            $table->string('sebab');
            $table->date('dibukukan_tanggal');
            $table->unsignedBigInteger('detail_kegiatan_id');
            $table->foreign('detail_kegiatan_id')->references('id')->on('detail_kegiatans')->onDelete('cascade');
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
        Schema::dropIfExists('kuitansis');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kegiatans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kegiatan_id')->unsigned()->index();
            $table->bigInteger('sub4_uraian_id')->unsigned()->index()->unique();
            $table->integer('status'); // 0 = Sebelum perubahan; 1 = Setelah perubahan;
            $table->foreign('kegiatan_id')->references('id')->on('kegiatans');
            $table->foreign('sub4_uraian_id')->references('id')->on('sub4_uraians');
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
        Schema::dropIfExists('detail_kegiatans');
    }
}

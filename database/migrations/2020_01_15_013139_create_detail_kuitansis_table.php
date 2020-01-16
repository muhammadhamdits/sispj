<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailKuitansisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kuitansis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('harga_satuan');
            $table->unsignedBigInteger('kuitansi_id');
            $table->integer('volume');
            $table->unsignedBigInteger('detail_item_id');
            $table->unique(['kuitansi_id', 'detail_item_id']);
            $table->foreign('kuitansi_id')->references('id')->on('kuitansis')->onDelete('cascade');
            $table->foreign('detail_item_id')->references('id')->on('detail_items')->onDelete('cascade');
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
        Schema::dropIfExists('detail_kuitansis');
    }
}

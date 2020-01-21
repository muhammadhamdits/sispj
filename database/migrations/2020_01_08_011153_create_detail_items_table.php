<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('detail_kegiatan_id');
            $table->unsignedBigInteger('item_id');
            $table->integer('harga_satuan');
            $table->integer('volume');
            $table->integer('status'); // 0 = Sebelum perubahan; 1 = Setelah perubahan;
            $table->foreign('detail_kegiatan_id')->references('id')->on('detail_kegiatans')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items');
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
        Schema::dropIfExists('detail_items');
    }
}

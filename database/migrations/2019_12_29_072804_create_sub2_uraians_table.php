<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSub2UraiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub2_uraians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rekening');
            $table->string('nama');
            $table->bigInteger('sub_uraian_id')->unsigned()->index();
            $table->unique(['rekening', 'sub_uraian_id']);
            $table->foreign('sub_uraian_id')->references('id')->on('sub_uraians');
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
        Schema::dropIfExists('sub2_uraians');
    }
}

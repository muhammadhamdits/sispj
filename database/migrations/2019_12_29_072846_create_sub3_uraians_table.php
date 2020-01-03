<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSub3UraiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub3_uraians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rekening')->unique();
            $table->string('nama');
            $table->bigInteger('sub2_uraian_id')->unsigned()->index();
            $table->foreign('sub2_uraian_id')->references('id')->on('sub2_uraians');
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
        Schema::dropIfExists('sub3_uraians');
    }
}

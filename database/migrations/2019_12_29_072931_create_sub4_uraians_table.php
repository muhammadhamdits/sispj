<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSub4UraiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub4_uraians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rekening')->unique();
            $table->string('nama');
            $table->bigInteger('sub3_uraian')->unsigned()->index();
            $table->foreign('sub3_uraian')->references('id')->on('sub3_uraians');
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
        Schema::dropIfExists('sub4_uraians');
    }
}

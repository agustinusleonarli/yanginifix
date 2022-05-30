<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenghargaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penghargaans', function (Blueprint $table) {
            $table->id();
            $table->string('jdl_penghargaan');
            $table->longText('desc_penghargaan');
            $table->string('image');
            $table->date('tgl_penghargaan');
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
        Schema::dropIfExists('penghargaans');
    }
}

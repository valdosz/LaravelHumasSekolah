<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHumasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('humas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('keperluan');
            $table->string('status');
            $table->string('kontak');
            $table->date('tgl_kunjungan');
            $table->string('foto');
            $table->timestamp("exit_at")->nullable();
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
        Schema::dropIfExists('humas');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRumahmakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rumahmakans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lokasi');
            $table->string('slug');
            $table->string('alamat');
            $table->string('jadwal');
            $table->string('no_telp');
            $table->string('typenumber');
            $table->text('artikel');
            $table->string('gambar');
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
        Schema::dropIfExists('rumahmakans');
    }
}

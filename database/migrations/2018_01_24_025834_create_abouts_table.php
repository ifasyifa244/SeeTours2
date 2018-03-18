<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->increments('id');
<<<<<<< HEAD:database/migrations/2018_01_24_025834_create_abouts_table.php
            $table->text('konten');
=======
            $table->string('nama');
            $table->string('alamat');
            $table->string('no_telepon');
>>>>>>> 51d53574806a4f0a4873213ff106f23d91444836:database/migrations/2017_07_30_080434_create_suppliers_table.php
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
        Schema::dropIfExists('abouts');
    }
}

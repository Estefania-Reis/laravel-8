<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kliente', function (Blueprint $table) {
            $table->id();
            $table->string('naran');
            $table->enum('genero',['M','F']);
            $table->date('data_moris');
            $table->string('naturalidade');
            $table->foreignId('aldeia_id');
            $table->foreignId('suco_id');
            $table->foreignId('posto_id');
            $table->foreignId('municipio_id');
            $table->integer('nmr_telfone');
            $table->string('foto');
            $table->timestamps();
            });

        Schema::rename('kliente', 'klientes');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kliente');
    }
}

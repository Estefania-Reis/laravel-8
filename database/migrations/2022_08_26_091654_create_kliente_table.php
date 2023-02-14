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
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_kliente');
            $table->string('naran');
            $table->enum('genero',['M','F']);
            $table->date('data_moris');
            $table->string('naturalidade');
            $table->string('aldeia_id');
            $table->string('suco_id');
            $table->string('posto_id');
            $table->string('municipio_id');
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

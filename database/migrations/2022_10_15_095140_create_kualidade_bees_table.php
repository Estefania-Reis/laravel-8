<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKualidadeBeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kualidade_bees', function (Blueprint $table) {
            $table->id();
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_kualidadeBee');
            $table->date('data');
            $table->string('kolam_id');
            $table->enum('status_bee_dalan_sai',['diak','aat']);
            $table->enum('status_bee_dalan_tama',['aat','diak']);
            $table->string('razaun')->nullable();
            $table->float('ph')->nullable();
            $table->float('temperatura')->nullable();
            $table->float('do')->nullable();
            $table->float('sd')->nullable();
            $table->enum('orijem_bee',['bee moris','pump']); 
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
        Schema::dropIfExists('kualidade_bees');
    }
}

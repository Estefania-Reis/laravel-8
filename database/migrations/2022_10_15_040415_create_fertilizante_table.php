<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFertilizanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fertilizante', function (Blueprint $table) {
            $table->id();
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_fertilizante');
            $table->string('naran');
            $table->integer('total_saka');
            $table->integer('total_kgsaka');
            $table->float('presusaka');
            $table->float('total_presu');
            $table->date('data_import');
            $table->date('data_expire');
            $table->timestamps();
        });
        Schema::rename('fertilizante', 'fertilizantes');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fertilizante');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistribuisaunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribuisaun', function (Blueprint $table) {
            $table->id();
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_distribuisaun');
            $table->date('data');
            $table->string('klienteIndividual_id')->nullable();
            $table->string('klienteGrupo_id')->nullable();
            $table->string('nursery_id');
            $table->integer('total_m_sex');
            $table->string('nurseryn_id');
            $table->integer('total_n_sex');
            $table->integer('total_ikan_oan');
            $table->string('objetivu');
            $table->integer('total_kolam');
            $table->integer('total_plastik');
            $table->integer('total_ikanplastik');
            $table->string('foto_kolam')->nullable();
            $table->string('foto_eleitoral')->nullable();
            $table->string('proposta')->nullable();
            $table->timestamps();
        });
        Schema::rename('distribuisaun', 'distribuisauns');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distribuisaun');
    }
}

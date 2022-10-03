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
            $table->foreignId('klienteIndividual_id');
            $table->foreignId('klienteGrupo_id');
            $table->integer('kuantidade_ikan_oan');
            $table->string('objetivu');
            $table->foreignId('aldeia_id');
            $table->foreignId('suku_id');
            $table->foreignId('postu_id');
            $table->foreignId('munisipio_id');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidus', function (Blueprint $table) {
            $table->id();
            $table->date('data')->nullable();
            $table->enum('tipu_benefisiariu',['benefisiariu individual','benefisiariu grupu']);
            $table->string('id_benefisiariu_ind')->nullable();
            $table->string('id_benefisiariu_gp')->nullable();
            $table->enum('objetivu',['komersial','laos komersial']);
            $table->string('proposta')->nullable();
            $table->integer('total_msex')->nullable();
            $table->integer('total_nmsex')->nullable();
            $table->string('deskreve_kolam');
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
        Schema::dropIfExists('pedidus');
    }
}

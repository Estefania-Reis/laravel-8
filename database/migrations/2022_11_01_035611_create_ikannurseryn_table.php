<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkannurserynTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikannurseryn', function (Blueprint $table) {
            $table->id();
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_ikannurseryn');
            $table->date('data');
            $table->string('kolam_id');
            $table->string('hapa_id');
            $table->integer('total_ikan_oan');
            $table->integer('adisiona_ikan_oan')->nullable();
            $table->enum('tipu_dim',['distribui', 'mate'])->nullable();
            $table->string('razaun_dim')->nullable();
            $table->integer('total_dim')->nullable();
            // $table->date('data_distribuisaun')->nullable();
            $table->string('klienteIndividual_id')->nullable();
            $table->string('klienteGrupo_id')->nullable();
            $table->integer('total_plastik')->nullable();
            $table->integer('total_ikanplastik')->nullable();
            $table->integer('string')->nullable();
            // $table->integer('total_distribuisaun')->nullable();
            $table->integer('total_ikan_oan_atual');
            $table->timestamps();
        });
        Schema::rename('ikannurseryn', 'ikannurseryns');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ikannurseryn');
    }
}

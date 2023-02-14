<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkanoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {//nursery
        Schema::create('ikanoan', function (Blueprint $table) {
            $table->id();
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_ikanoan');
            $table->date('data');
            $table->string('kolam_nursery_id');
            $table->string('hapa_id');
            $table->integer('total_msex')->nullable();
            $table->integer('total_nmsex')->nullable();
            $table->integer('total_ikan_oan');
            $table->integer('total_msex_ad')->nullable();
            $table->integer('total_nmsex_ad')->nullable();
            $table->integer('total_ikan_nursery_adisiona')->nullable();
            $table->enum('tipu_dim',['distribui', 'mate'])->nullable();
            $table->integer('total_msex_dim')->nullable();
            $table->integer('total_nmsex_dim')->nullable();
            $table->string('razaun_dim')->nullable();
            $table->integer('total_dim')->nullable();
            // $table->date('data_distribuisaun')->nullable();
            $table->string('klienteIndividual_id')->nullable();
            $table->string('klienteGrupo_id')->nullable();
            $table->integer('total_plastik_msex')->nullable();
            $table->integer('total_plastik_nmsex')->nullable();
            $table->string('total_ikanplastik_msex')->nullable();
            $table->string('total_ikanplastik_nmsex')->nullable();
            // $table->integer('total_distribuisaun')->nullable();
            $table->integer('total_ikan_oan_msex_atual');
            $table->integer('total_ikan_oan_nmsex_atual');
            $table->integer('total_ikan_oan_atual');
            $table->timestamps();
           });
           Schema::rename('ikanoan', 'ikanoans');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ikanoan');
    }
}

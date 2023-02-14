<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikan', function (Blueprint $table) {
            $table->id();
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_ikanbrood');
            $table->date('data');
            $table->integer('total_m');
            $table->integer('total_f');
            $table->integer('total');
            $table->string('kolam_id');
            $table->string('hapa_id');
            $table->string('tipu_ikan');
            $table->string('nasaun');
            $table->enum('jerasaun',['I', 'II', 'III', 'IV']);
            $table->enum('codigo_familia',['C1','C2','C3','C4']);
            $table->date('data_dim')->nullable();
            $table->enum('tipu_dim',['haksoit sai', 'mate'])->nullable();
            $table->string('razaun')->nullable();
            $table->integer('qty_dim_m')->nullable();
            $table->integer('qty_dim_f')->nullable();
            $table->integer('total_dim')->nullable();
            $table->integer('qty_rez_m')->nullable();
            $table->integer('qty_rez_f')->nullable();
            $table->integer('total_rez')->nullable();
            $table->integer('total_rez_m')->nullable();
            $table->integer('total_rez_f')->nullable();
            $table->integer('sub_total_rez')->nullable();
            $table->integer('qty_atual_m')->nullable();
            $table->integer('qty_atual_f')->nullable();
            $table->integer('total_atual')->nullable();
            $table->timestamps();
        });
        Schema::rename('ikan', 'ikanbroods');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ikan');
    }
}

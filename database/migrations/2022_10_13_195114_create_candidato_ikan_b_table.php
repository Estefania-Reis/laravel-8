<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatoIkanBTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidato_ikan_b', function (Blueprint $table) {
            $table->id();
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_candidato_ikan_b');
            $table->date('data');
            $table->string('kolam_id');
            $table->string('hapa_id');
            $table->enum('codigo_familia',['C1','C2','C3','C4']);
            $table->integer('total_M');
            $table->integer('total_F');
            $table->integer('subtotal');
            $table->timestamps();
        });
        Schema::rename('candidato_ikan_b', 'candidatoikanbs');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidato_ikan_b');
    }
}

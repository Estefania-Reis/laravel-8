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
            $table->foreignId('tipu_id');
            $table->enum('jerasaun',['I', 'II', 'III', 'IV']);
            $table->integer('kuantidade_ikan_aman');
            $table->integer('kuantidade_ikan_inan');
            $table->foreignId('orijem_id');
            $table->foreignId('kolam_id');
            $table->foreignId('hapa_id');
            $table->date('periodo');
            $table->date('periodo_expire');
            $table->timestamps();
        });
        Schema::rename('ikan', 'ikans');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHahanikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hahanikan', function (Blueprint $table) {
            $table->id();
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_hahanikan');
            $table->string('naran');
            $table->string('unidade');
            $table->integer('total_saka');
            $table->integer('pezu_saka');
            $table->float('presu_saka');
            $table->float('total_presu');
            $table->enum('tipu_ikan',['ikan brood','ikan srt','ikan nursery', 'ikan nursery none mono sex']);
            $table->date('data_import');
            $table->date('data_expire');
            $table->timestamps();
        });
        Schema::rename('hahanikan', 'hahanikans');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hahanikan');
    }
}

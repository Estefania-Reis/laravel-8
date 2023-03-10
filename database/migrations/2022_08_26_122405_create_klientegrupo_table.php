<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlientegrupoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klientegrupo', function (Blueprint $table) {
            $table->id();
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_klientegrupo');
            $table->string('naran');
            $table->string('chefe_grupo');
            // $table->string('foto_kartaun');
            $table->bigInteger('no_id_xefe'); 
            $table->enum('jeneru', ['M', 'F']);
            $table->string('r_aldeia');
            $table->string('r_suku');
            $table->string('r_postu');
            $table->string('r_munisipio');
            $table->integer('nmr_telfone');
            $table->timestamps();   
        });
        Schema::rename('klientegrupo', 'klientegrupos');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('klientegrupo');
    }
}

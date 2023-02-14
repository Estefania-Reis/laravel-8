<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkankompradoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikankomprado', function (Blueprint $table) {
            $table->id();
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_ikankomprado');
            $table->date('data');
            $table->string('lelaun_id');
            $table->integer('no_eleitoral')->nullable();
            $table->integer('no_bi')->nullable();
            $table->string('naran_kliente');
            $table->float('peso');
            $table->float('presu');
            $table->float('total');
            $table->timestamps();
        });
        Schema::rename('ikankomprado', 'ikankomprados');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ikankomprado');
    }
}

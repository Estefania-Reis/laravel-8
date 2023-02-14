<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkansrtdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikansrtds', function (Blueprint $table) {
            $table->id();
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_ikansrtd');
            $table->string('id_dim_ant')->nullable();
            $table->date('data');
            $table->string('ikansrt_id');
            $table->integer('totalsrt');
            $table->string('nursery_id');
            $table->integer('total_nursery');
            $table->integer('total_diminuisaun');
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
        Schema::dropIfExists('ikansrtds');
    }
}

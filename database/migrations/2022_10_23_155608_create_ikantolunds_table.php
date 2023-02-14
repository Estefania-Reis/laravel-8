<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkantolundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikantolunds', function (Blueprint $table) {
            $table->id();
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_ikantolund');
            $table->string('id_dim_ant')->nullable();
            $table->date('data');
            $table->string('ikantolun_id');
            $table->integer('total_ikantolun');
            $table->string('srt_id');
            $table->integer('total_srt');
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
        Schema::dropIfExists('ikantolunds');
    }
}

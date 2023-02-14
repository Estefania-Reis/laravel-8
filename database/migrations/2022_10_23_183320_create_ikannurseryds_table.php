<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkannurserydsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikannurseryds', function (Blueprint $table) {
            $table->id();
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_ikannurseryd');
            $table->string('id_dim_ant')->nullable();
            $table->date('data');
            $table->string('nursery_id');
            $table->integer('total_nursery');
            $table->string('distribuisaun_id');
            $table->integer('total_distribuisaun');
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
        Schema::dropIfExists('ikannurseryds');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatoikanbdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatoikanbds', function (Blueprint $table) {
            $table->id();
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_candidatoikanbd');
            $table->string('id_dim_ant')->nullable();
            $table->date('data');
            $table->string('ikan_id');
            $table->integer('total_m');
            $table->integer('total_f');
            $table->integer('subtotal');
            $table->enum('tipu_diminui',['haksoit sai','mate']);
            $table->string('razaun')->nullable();
            $table->integer('qty_ikan_aman')->nullable();
            $table->integer('qty_ikan_inan')->nullable();
            $table->integer('total_diminui');
            $table->enum('ikan_rezerva',['iha','la iha']);
            $table->integer('total_troka_m')->nullable();
            $table->integer('total_troka_f')->nullable();
            $table->integer('total_ikan_troka')->nullable();
            $table->integer('total_ikan_atual_m');
            $table->integer('total_ikan_atual_f');
            $table->integer('total_atual');
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
        Schema::dropIfExists('candidatoikanbds');
    }
}

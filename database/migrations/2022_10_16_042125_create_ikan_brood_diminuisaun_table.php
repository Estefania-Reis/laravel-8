<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkanBroodDiminuisaunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikan_brood_diminuisaun', function (Blueprint $table) {
            $table->id();
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_ikanbd');
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
        Schema::rename('ikan_brood_diminuisaun', 'ikanbds');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ikan_brood_diminuisaun');
    }
}

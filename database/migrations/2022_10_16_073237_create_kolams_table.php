<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKolamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kolams', function (Blueprint $table) {
            $table->id();
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_kolam');
            $table->enum('tipu_kolam',['kandidatu brood', 'brood','nursery','srt', 'nursery none mono sex']);
            $table->string('funsionamentu');
            $table->string('employee_id');
            $table->float('largura_kolam');
            $table->float('comprimento_kolam');
            $table->float('area_kolam');
            $table->float('altura_kolam');
            $table->float('volume_kolam');
            $table->enum('status',['diak','aat','aat grave','manutensaun']);
            $table->text('observasaun')->nullable();
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
        Schema::dropIfExists('kolams');
    }
}

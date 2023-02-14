<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLelaunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lelaun', function (Blueprint $table) {
            $table->id();
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_lelaun');
            $table->integer('total_ikan');
            $table->float('presukg');
            $table->date('data_loke_lelaun');
            $table->date('data_remata_lelaun');
            $table->timestamps();
        });
        Schema::rename('lelaun', 'lelauns');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lelaun');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFohanikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fohanikan', function (Blueprint $table) {
            $table->id();
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_fohanikan');
            $table->string('hahan_id');
            $table->string('kolam_id');
            $table->time('oras_fo_han');
            $table->float('qty');
            $table->time('oras_fo_han2');
            $table->float('qty2');
            $table->date('data_fo_han');
            $table->float('total');
            $table->string('staff_id');
            $table->timestamps();
        });
        Schema::rename('fohanikan', 'fohanikans');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fohanikan');
    }
}

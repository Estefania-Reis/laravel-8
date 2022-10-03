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
            $table->foreignId('hahan_id');
            $table->time('oras_fo_han');
            $table->date('data_fo_han');
            $table->float('kuantidade');
            $table->foreignId('staff_id');
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

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
            $table->foreignId('lelaun_id');
            $table->float('todan');
            $table->float('presu');
            $table->integer('kuantidade');
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

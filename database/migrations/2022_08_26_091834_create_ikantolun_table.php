<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkantolunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikantolun', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ikan_id');
            $table->float('pesu');
            $table->string('unidade');
            $table->foreignId('bee_id');
            $table->foreignId('incubator_id');
            $table->date('data');
            $table->timestamps();
        });
        Schema::rename('ikantolun', 'ikantoluns');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ikantolun');
    }
}

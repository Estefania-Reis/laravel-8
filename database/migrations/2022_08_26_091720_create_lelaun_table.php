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
            $table->integer('kuantidade');
            $table->date('data');
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

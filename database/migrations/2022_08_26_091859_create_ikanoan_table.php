<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkanoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikanoan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ikan_tolun_id');
            $table->integer('kuantidade');
            $table->string('unidade');
            $table->foreignId('kolam_nursery_id');
            $table->date('data');
            $table->timestamps();
           });
           Schema::rename('ikanoan', 'ikanoans');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ikanoan');
    }
}

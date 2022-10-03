<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbknurseryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbknursery', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id');
            $table->foreignId('knursery_id');
            $table->time('oras_tb');
            $table->date('data_tb');
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
        Schema::dropIfExists('tbknursery');
    }
}

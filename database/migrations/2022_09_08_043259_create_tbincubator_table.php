<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbincubatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbincubator', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incubator_id');
            $table->foreignId('employee_id');
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
        Schema::dropIfExists('tbincubator');
    }
}

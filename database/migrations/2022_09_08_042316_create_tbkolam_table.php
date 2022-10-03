<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbkolamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbkolam', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id');
            $table->foreignId('kolam_id');
            $table->foreignId('bee_id');
            $table->time('oras_tb');
            $table->date('data_tb');
            $table->timestamps();
        });
        Schema::rename('tbkolam', 'tbkolams');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbkolam');
    }
}

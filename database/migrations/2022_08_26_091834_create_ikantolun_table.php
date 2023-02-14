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
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_ikantolun');
            $table->date('data_kolleta');
            $table->string('ikan_id');
            $table->string('kolam_id')->nullable();
            $table->string('hapa_id')->nullable();
            $table->string('staff_id');
            $table->integer('total_ikan_F');
            $table->integer('total_ikan_tolun');
            $table->string('incubator_id')->nullable();
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

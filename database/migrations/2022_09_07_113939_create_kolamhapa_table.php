<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKolamhapaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kolamhapa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kolam_id');
            $table->foreignId('hapa_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *ss
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kolamhapa');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHahanikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hahanikan', function (Blueprint $table) {
            $table->id();
            $table->string('naran');
            $table->string('unidade');
            $table->integer('kuantidade');
            $table->float('presu');
            $table->float('total_presu');
            $table->date('data');
            $table->date('data_hahan_expire');
            $table->timestamps();
        });
        Schema::rename('hahanikan', 'hahanikans');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hahanikan');
    }
}

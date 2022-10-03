<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateNiveleducasaunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niveleducasaun', function (Blueprint $table) {
            $table->id();
            $table->string('naran');
            $table->timestamps();
        });

        Schema::rename('niveleducasaun', 'niveleducasauns');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('niveleducasaun');
    }
}

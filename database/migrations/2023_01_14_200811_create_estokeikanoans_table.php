<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstokeikanoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estokeikanoans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ikan_oan_id');
            $table->integer('total_ikan_oan');
            $table->foreignId('dim_id');
            $table->integer('total_ikan_oan_diminuidu');
            $table->foreignId('distribuisaun_id');
            $table->integer('total_ikan_oan_distribuidu');
            $table->integer('total_ikan_oan_atual');
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
        Schema::dropIfExists('estokeikanoans');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockFertilizanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_fertilizante', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->time('oras');
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_stockfertilizante');
            $table->string('fertilizante_id');
            $table->string('taufertilizante_id');
            $table->float('total_fertilizante');
            $table->float('total_taufertilizante');
            $table->float('total_stockfertilizante');
            $table->timestamps();
        });
        Schema::rename('stock_fertilizante', 'stock_fertilizantes');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_fertilizante');
    }
}

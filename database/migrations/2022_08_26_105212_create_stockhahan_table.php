<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockhahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockhahan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hahan_id');
            $table->foreignId('fo_han_id');
            $table->float('kuantidade_stock');
            $table->date('date_stock_hotu');
            $table->timestamps();
        });
        Schema::rename('stockhahan', 'stockhahans');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stockhahan');
    }
}

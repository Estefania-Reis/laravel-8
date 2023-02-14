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
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_stockhahan');
            $table->date('data');
            $table->string('hahan_id')->nullable();
            $table->float('total_hahan')->nullable();
            $table->string('fohan_id');
            $table->float('total_fohan');
            $table->float('total_stock')->nullable();
            $table->float('subtotal_stock');
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

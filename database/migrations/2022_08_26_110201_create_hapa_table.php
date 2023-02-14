<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHapaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hapa', function (Blueprint $table) {
            $table->id();
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_hapa');
            $table->string('kolam_id');
            $table->enum('tipu_hapa',['L','M','S'])->nullable();
            $table->float('largura');
            $table->float('comprimento');
            $table->float('area');
            $table->float('altura');
            $table->float('volume');
            $table->enum('status',['Diak','Aat','Aatgrave','Manutensaun']);
            $table->text('obs');
            $table->timestamps();
        });
        Schema::rename('hapa', 'hapas');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hapa');
    }
}

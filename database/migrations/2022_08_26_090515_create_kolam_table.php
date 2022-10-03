<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKolamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kolam', function (Blueprint $table) {
            $table->id();
            $table->float('luan');
            $table->float('naruk');
            $table->float('altura');
            $table->float('volume_bee');
            $table->enum('tipu_kolam',['brood', 'nursery','srt']);
            $table->enum('hapa1',['Diak','Aat','Aatgrave','Manutensaun']);
            $table->enum('hapa2',['Diak','Aat','Aatgrave','Manutensaun']);
            $table->enum('hapa3',['Diak','Aat','Aatgrave','Manutensaun']);
            $table->enum('status_kolam',['Diak','Aat','Aatgrave','Manutensaun']);
            $table->text('observasaun');
            $table->timestamps();  
        });
        Schema::rename('kolam', 'kolams');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kolam');
    }
}

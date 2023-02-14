<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('numeru');
            $table->foreignId('series_id');
            $table->string('id_employee');
            $table->string('naran');
            $table->enum('jeneru',['M','F']);
            $table->bigInteger('nmr_telefone');
            $table->string('foto');
            $table->date('data_moris');
            $table->enum('pozisaun',['chefe departamento (PAAD)','responsavel centro', 'tekniku administrasaun1', 'tekniku administrasaun2', 'tekniku (brood fish)', 'tekniku (incubator)','tekniku (srt)','tekniku (nursery)','tekniku (water quality and disease)','staff']);
            $table->enum('status',['permanente','casuais','agente administrasaun']);
            $table->string('nivel_ed_id');
            $table->enum('level',['I','II','III','IV','V','VI','VII']);
            $table->enum('obs',['Nacional','Extencionista Municipio']);
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
        Schema::dropIfExists('employees');
    }
}

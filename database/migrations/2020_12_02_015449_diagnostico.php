<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Diagnostico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostico', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('gravedad_especifica');
            $table->integer('voltaje');
            $table->integer('temperatura');
            $table->integer('corriente_ac_dc');
            $table->string('hora', 10);
            $table->integer('corriente');
            $table->integer('voltaje_corte');
            $table->string('tiempo_descarga', 10);
            $table->integer('capacidad');
            $table->integer('eficiencia');
            $table->integer('impedancia')->nullable();
            $table->integer('cca_cold_cranking_ampere')->nullable();
            
            $table->unsignedBigInteger('bateria_id');
            $table->foreign('bateria_id')->references('id')->on('bateria')->onDelete('restrict')->onUpdate('restrict');
             
            $table->unsignedInteger('user_register');
            
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            
            $table->index(['hora','tiempo_descarga','created_at','updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnostico');
    }
}
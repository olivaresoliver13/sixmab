<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Alarmas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alarmas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('solucionado')->default($value = false);

            $table->unsignedBigInteger('dispositivo_id');
            $table->foreign('dispositivo_id')->references('id')->on('dispositivo')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedBigInteger('medicion_id');
            $table->foreign('medicion_id')->references('id')->on('medicion')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedBigInteger('usuario_solucion')->nullable();
            $table->foreign('usuario_solucion')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');

            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            
            $table->index(['created_at','updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alarmas');
    }
}
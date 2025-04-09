<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Celdas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celdas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('numero_celda');
            
            $table->unsignedBigInteger('dispositivo_id');
            $table->foreign('dispositivo_id')->references('id')->on('dispositivo')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedBigInteger('bateria_id');
            $table->foreign('bateria_id')->references('id')->on('bateria')->onDelete('restrict')->onUpdate('restrict');
            
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
        Schema::dropIfExists('celdas');
    }
}
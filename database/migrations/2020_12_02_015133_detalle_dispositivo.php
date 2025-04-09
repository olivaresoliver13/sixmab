<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetalleDispositivo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_dispositivo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('voltaje_max', 6, 2);
            $table->double('voltaje_min', 6, 2);
            $table->double('corriente_max', 6, 2);
            $table->double('corriente_min', 6, 2);
            $table->double('temperatura_max', 6, 2);
            $table->double('temperatura_min', 6, 2);    

            $table->unsignedBigInteger('dispositivo_id');
            $table->foreign('dispositivo_id')->references('id')->on('dispositivo')->onDelete('restrict')->onUpdate('restrict');            
            
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';

            $table->index(['voltaje_max','voltaje_min','corriente_max','corriente_min','temperatura_max','temperatura_min','created_at','updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_dispositivo');
    }
}
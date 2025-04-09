<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PasosixmabBateria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasosixmab_bateria', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('bateria_id');
            $table->foreign('bateria_id')->references('id')->on('bateria')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedBigInteger('tipo_paso_sixmab_id');
            $table->foreign('tipo_paso_sixmab_id')->references('id')->on('tipo_paso_sixmab')->onDelete('restrict')->onUpdate('restrict');
            
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
        Schema::dropIfExists('pasosixmab_bateria');
    }
}
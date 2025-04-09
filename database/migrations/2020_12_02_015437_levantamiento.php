<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Levantamiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levantamiento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fecha_compra');
            $table->date('fecha', 10);
            $table->text('nota')->nullable();
            $table->integer('puente_defectuoso_oxidado');
            $table->boolean('polo_levantado');
            $table->boolean('oxidacion_fuerte');
            $table->text('otro')->nullable();

            $table->unsignedBigInteger('tipo_trabajo_id')->nullable();
            $table->foreign('tipo_trabajo_id')->references('id')->on('tipo_trabajo')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('tipo_cuidado_id')->nullable();
            $table->foreign('tipo_cuidado_id')->references('id')->on('tipo_cuidado')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedBigInteger('vaso_cambiado_id')->nullable();
            $table->foreign('vaso_cambiado_id')->references('id')->on('vaso_cambiado')->onDelete('restrict')->onUpdate('restrict');
                    
            $table->unsignedBigInteger('dano_fisico_id')->nullable();
            $table->foreign('dano_fisico_id')->references('id')->on('dano_fisico')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('fuga_id')->nullable();
            $table->foreign('fuga_id')->references('id')->on('fuga')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('desbordamiento_acido_id')->nullable();
            $table->foreign('desbordamiento_acido_id')->references('id')->on('desbordamiento_acido')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('nivel_bajo_electrolito_id')->nullable();
            $table->foreign('nivel_bajo_electrolito_id')->references('id')->on('nivel_bajo_electrolito')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('bateria_id');
            $table->foreign('bateria_id')->references('id')->on('bateria')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedInteger('user_register');

            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            
            $table->index(['fecha','nota','otro','created_at','updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levantamiento');
    }
}
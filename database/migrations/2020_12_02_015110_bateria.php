<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bateria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bateria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero_bateria',100)->unique();
            $table->string('siglas',15)->unique();
            $table->double('cca_o_impedancia', 8, 2)->nullable();
            $table->string('numero_serie',50);
            $table->double('voltaje_nominal', 6, 2);
            $table->double('capacidad_nominal', 8, 2);
            $table->double('descarga_nominal', 8, 2);
            $table->boolean('estado')->default($value = true);
            $table->unsignedInteger('cantidad_celda');
            $table->unsignedInteger('cantidad_temperatura');

            $table->unsignedBigInteger('composicion_quimica_id');
            $table->foreign('composicion_quimica_id')->references('id')->on('composicion_quimica')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('tipo_bateria_id');
            $table->foreign('tipo_bateria_id')->references('id')->on('tipo_bateria')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedBigInteger('maquinaria_id');
            $table->foreign('maquinaria_id')->references('id')->on('maquinaria')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedBigInteger('dispositivo_id')->nullable();
            $table->foreign('dispositivo_id')->references('id')->on('dispositivo')->onDelete('restrict')->onUpdate('restrict');     

            $table->unsignedBigInteger('marca_id');
            $table->foreign('marca_id')->references('id')->on('marca')->onDelete('restrict')->onUpdate('restrict');    
            
            $table->unsignedBigInteger('modelo_id');
            $table->foreign('modelo_id')->references('id')->on('modelo')->onDelete('restrict')->onUpdate('restrict');    

            $table->unsignedInteger('user_register');

            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            
            $table->index(['numero_bateria','siglas','cca_o_impedancia','numero_serie','voltaje_nominal','capacidad_nominal','descarga_nominal', 'created_at','updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bateria');
    }
}
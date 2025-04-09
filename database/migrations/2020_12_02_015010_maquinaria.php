<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Maquinaria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquinaria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo', 100)->unique();
            $table->string('siglas',15)->unique();  
            $table->boolean('estado')->default($value = true);  

            $table->unsignedBigInteger('planta_id');
            $table->foreign('planta_id')->references('id')->on('planta');   

            $table->unsignedBigInteger('tipo_maquinaria_id');
            $table->foreign('tipo_maquinaria_id')->references('id')->on('tipo_maquinaria')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedInteger('user_register');
            
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            
            $table->index(['codigo','siglas','created_at','updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maquinaria');
    }
}
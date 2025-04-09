<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',100)->unique();
            $table->string('siglas',15)->unique();
            $table->string('identificador',20)->unique();
            $table->string('telefono1',20);
            $table->string('telefono2',20)->nullable();
            $table->string('email',50)->unique();
            $table->string('direccion',500);
            $table->boolean('estado')->default($value = true);  

            $table->unsignedBigInteger('pais_id');
            $table->foreign('pais_id')->references('id')->on('pais')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedInteger('user_register');
            
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';

            $table->index(['nombre','siglas', 'identificador','telefono1','telefono2','email','direccion','created_at','updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa');
    }
}
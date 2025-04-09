<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dispositivo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispositivo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('identificador')->unique();
            $table->unsignedInteger('tipo_dispositivo');
            $table->boolean('estado')->default($value = true);

            $table->unsignedBigInteger('maestro_id')->nullable();
            $table->foreign('maestro_id')->references('id')->on('dispositivo')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedInteger('user_register');

            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            
            $table->index(['identificador','created_at','updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispositivo');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DanoFisico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dano_fisico', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50)->unique();
            $table->boolean('estado')->default($value = true);

            $table->unsignedInteger('user_register');
            
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';

            $table->index(['nombre','created_at','updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dano_fisico');
    }
}
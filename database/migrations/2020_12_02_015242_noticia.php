<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Noticia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo', 50);
            $table->string('entradilla', 500);
            $table->text('texto1');
            $table->text('texto2')->nullable();
            $table->text('texto3')->nullable();
            $table->text('texto4')->nullable();
            $table->text('texto5')->nullable();
            $table->string('autor', 64);
            $table->string('link', 64)->nullable();
            $table->string('foto', 100)->nullable()->unique();
            $table->boolean('estado')->default($value = true);  

            $table->unsignedInteger('user_register');

            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';

            $table->index(['titulo','entradilla','texto1','texto2','texto3','texto4','texto5','autor','link','foto','created_at','updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticia');
    }
}
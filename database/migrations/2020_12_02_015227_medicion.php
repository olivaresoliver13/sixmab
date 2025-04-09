<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Medicion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('corriente', 6, 2)->nullable();
            $table->double('corriente1', 6, 2)->nullable();
            $table->double('corriente2', 6, 2)->nullable();
            $table->double('corriente3', 6, 2)->nullable();
            $table->double('corriente4', 6, 2)->nullable();
            $table->double('temperatura0', 6, 2)->nullable();
            $table->double('temperatura1', 6, 2)->nullable();
            $table->double('temperatura2', 6, 2)->nullable();
            $table->double('temperatura3', 6, 2)->nullable();
            $table->double('temperatura4', 6, 2)->nullable();
            $table->double('temperatura5', 6, 2)->nullable();
            $table->double('temperatura6', 6, 2)->nullable();
            $table->double('temperatura7', 6, 2)->nullable();
            $table->double('temperatura8', 6, 2)->nullable();
            $table->double('temperatura9', 6, 2)->nullable();
            $table->double('voltajeTotal', 6, 2)->nullable();
            $table->double('voltaje0', 6, 2)->nullable();
            $table->double('voltaje1', 6, 2)->nullable();
            $table->double('voltaje2', 6, 2)->nullable();
            $table->double('voltaje3', 6, 2)->nullable();
            $table->double('voltaje4', 6, 2)->nullable();
            $table->double('voltaje5', 6, 2)->nullable();
            $table->double('voltaje6', 6, 2)->nullable();
            $table->double('voltaje7', 6, 2)->nullable();
            $table->double('voltaje8', 6, 2)->nullable();
            $table->double('voltaje9', 6, 2)->nullable();
            $table->double('voltaje10', 6, 2)->nullable();
            $table->double('voltaje11', 6, 2)->nullable();
            $table->double('voltaje12', 6, 2)->nullable();
            $table->double('voltaje13', 6, 2)->nullable();
            $table->double('voltaje14', 6, 2)->nullable();
            $table->double('voltaje15', 6, 2)->nullable();
            $table->double('voltaje16', 6, 2)->nullable();
            $table->double('voltaje17', 6, 2)->nullable();
            $table->double('voltaje18', 6, 2)->nullable();
            $table->double('voltaje19', 6, 2)->nullable();
            $table->double('voltaje20', 6, 2)->nullable();
            $table->double('voltaje21', 6, 2)->nullable();
            $table->double('voltaje22', 6, 2)->nullable();
            $table->double('voltaje23', 6, 2)->nullable();              
            $table->double('voltaje24', 6, 2)->nullable();               
            $table->double('voltaje25', 6, 2)->nullable();              
            $table->double('voltaje26', 6, 2)->nullable();              
            $table->double('voltaje27', 6, 2)->nullable();              
            $table->double('voltaje28', 6, 2)->nullable();              
            $table->double('voltaje29', 6, 2)->nullable();              
            $table->double('voltaje30', 6, 2)->nullable();              
            $table->double('voltaje31', 6, 2)->nullable();              
            $table->double('voltaje32', 6, 2)->nullable();              
            $table->double('voltaje33', 6, 2)->nullable();              
            $table->double('voltaje34', 6, 2)->nullable();              
            $table->double('voltaje35', 6, 2)->nullable();              
            $table->double('voltaje36', 6, 2)->nullable();              
            $table->double('voltaje37', 6, 2)->nullable();              
            $table->double('voltaje38', 6, 2)->nullable();              
            $table->double('voltaje39', 6, 2)->nullable();              
            $table->double('voltaje40', 6, 2)->nullable();              
            $table->double('voltaje41', 6, 2)->nullable();              
            $table->double('voltaje42', 6, 2)->nullable();              
            $table->double('voltaje43', 6, 2)->nullable();              
            $table->double('voltaje44', 6, 2)->nullable();              
            $table->double('voltaje45', 6, 2)->nullable();              
            $table->double('voltaje46', 6, 2)->nullable();              
            $table->double('voltaje47', 6, 2)->nullable();                                     
            
            $table->bigInteger('maestro_id');
            $table->foreign('maestro_id')->references('id')->on('dispositivo')->onDelete('restrict')->onUpdate('restrict');

            $table->bigInteger('bateria_id');
            $table->foreign('bateria_id')->references('id')->on('bateria')->onDelete('restrict')->onUpdate('restrict');

            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';

            $table->index(['corriente','corriente1','corriente2','corriente3','corriente4']);
            $table->index(['temperatura0','temperatura1','temperatura2','temperatura3','temperatura4','temperatura5','temperatura6','temperatura7','temperatura8','temperatura9']);
            $table->index(['voltaje0','voltaje1','voltaje2','voltaje3','voltaje4','voltaje5','voltaje6','voltaje7','voltaje8','voltaje9','voltaje10','voltaje11','voltaje12','voltaje13','voltaje14','voltaje15','voltaje16','voltaje17','voltaje18','voltaje19','voltaje20','voltaje21','voltaje22','voltaje23']);
            $table->index(['voltaje24','voltaje25','voltaje26','voltaje27','voltaje28','voltaje29','voltaje30','voltaje31','voltaje32','voltaje33','voltaje34','voltaje35','voltaje36','voltaje37','voltaje38','voltaje39','voltaje40','voltaje41','voltaje42','voltaje43','voltaje44','voltaje45','voltaje46','voltaje47']);
            $table->index(['voltajeTotal']);
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
        Schema::dropIfExists('medicion');
    }
}
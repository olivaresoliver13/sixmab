<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50);
            $table->string('email',50)->unique();
            $table->timestamp('email_verified_at',50)->nullable();
            $table->string('password',100);
            $table->string('foto', 100)->nullable()->unique();
            $table->boolean('status');  
            $table->boolean('privilege');  
            $table->rememberToken();  
            
            $table->unsignedInteger('user_register');

            $table->timestamp('last_login_at')->nullable();
	              
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
	    
            $table->index(['name', 'email','email_verified_at', 'password', 'foto', 'last_login_at', 'created_at','updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
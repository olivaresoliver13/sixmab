<?php

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name'		    => 'Administrador General',
                'slug'  	    => 'admin',
                'description'  	=> 'Acceso general del sistema',
                'special' 	    => 'Acceso total',
                'user_register' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [
                'name'		    => 'Administrador de Usuarios',
                'slug'  	    => 'admin.users',
                'description'  	=> 'Acceso especializado del sistema',
                'special' 	    => null,
                'user_register' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [
                'name'		    => 'Invitado',
                'slug'  	    => 'guest',
                'description'  	=> 'Acceso visual del sistema',
                'special' 	    => null,
                'user_register' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [
                'name'		    => 'Administrador de Noticias',
                'slug'  	    => 'noticias',
                'description'  	=> 'Edita, elimina, activa y desactiva una noticia',
                'special' 	    => null,
                'user_register' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [
                'name'		    => 'Administrador de Dispositivo',
                'slug'  	    => 'dispositivo',
                'description'  	=> 'Edita, elimina, activa y desactiva un dispositivo',
                'special' 	    => null,
                'user_register' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [
                'name'		    => 'Suspendido',
                'slug'  	    => 'no.access',
                'description'  	=> 'Acceso restriguido del sistema',
                'special' 	    => 'Sin acceso',
                'user_register' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
        ]); 
    }
}
<?php

use Illuminate\Database\Seeder;

use App\Models\Dispositivo\Dispositivo;

class DispositivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dispositivo')->insert([
            [
                'identificador'    => 'ALG001',
                'tipo_dispositivo' => '1',
                'maestro_id'  	   => null,
                'estado' 	       => true,
                'user_register' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [
                'identificador'    => 'Eternity0001',
                'tipo_dispositivo' => '1',
                'maestro_id'  	   => null,
                'estado' 	       => true,
                'user_register' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [
                'identificador'    => 'Eternity0001-E',
                'tipo_dispositivo' => '2',
                'maestro_id'  	   => '2',
                'estado' 	       => true,
                'user_register' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [
                'identificador'    => 'Device-01',
                'tipo_dispositivo' => '1',
                'maestro_id'  	   => null,
                'estado' 	       => true,
                'user_register' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
        ]); 
    }
}
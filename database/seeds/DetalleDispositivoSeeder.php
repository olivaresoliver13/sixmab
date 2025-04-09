<?php

use Illuminate\Database\Seeder;

use App\Models\Dispositivo\DetalleDispositivo;

class DetalleDispositivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detalle_dispositivo')->insert([
            [
                'voltaje_max'     => '15',
                'voltaje_min'     => '11',
                'corriente_max'   => '100',
                'corriente_min'   => '-10',
                'temperatura_max' => '55',
                'temperatura_min' => '0',
                'dispositivo_id'  => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [
                'voltaje_max'     => '2.75',
                'voltaje_min'     => '1.7',
                'corriente_max'   => '40',
                'corriente_min'   => '-10',
                'temperatura_max' => '50',
                'temperatura_min' => '0',
                'dispositivo_id'  => 2,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [
                'voltaje_max'     => '2.75',
                'voltaje_min'     => '1.7',
                'corriente_max'   => '40',
                'corriente_min'   => '-10',
                'temperatura_max' => '50',
                'temperatura_min' => '0',
                'dispositivo_id'  => 4,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
        ]);
    }
}
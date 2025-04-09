<?php

use Illuminate\Database\Seeder;

use App\Models\Procesos\Bateria;

class BateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bateria = [    
            [
                'numero_bateria' => 'Pla001',
                'siglas' => 'BBS_PLA',
                'composicion_quimica_id' => 1,
                'cca_o_impedancia' => '45',
                'marca_id' => 1,
                'modelo_id' => 1,
                'numero_serie' => 'B1',
                'voltaje_nominal' => '100',
                'capacidad_nominal' => '100',
                'descarga_nominal' => '100',
                'tipo_bateria_id' => 1,
                'maquinaria_id' => 1,
                'cantidad_celda' => 24,
                'cantidad_temperatura' => 6,
                'user_register' => 1,
            ],
            [
                'numero_bateria' => 'ALG_0001',
                'siglas' => 'ALG/ÑU/Tri75',
                'composicion_quimica_id' => 1,
                'marca_id' => 1,
                'modelo_id' => 1,
                'numero_serie' => 'B1',
                'voltaje_nominal' => '12',
                'capacidad_nominal' => '120',
                'descarga_nominal' => '4',
                'tipo_bateria_id' => 2,
                'maquinaria_id' => 2,
                'dispositivo_id' => 1,
                'cantidad_celda' => 5,
                'cantidad_temperatura' => 2,
                'user_register' => 1,
            ],
            [
                'numero_bateria' => 'ETLtam0001-05-16-12341',
                'siglas' => 'etltam',
                'composicion_quimica_id' => 1,
                'marca_id' => 1,
                'modelo_id' => 1,
                'numero_serie' => '12222222',
                'voltaje_nominal' => '48',
                'capacidad_nominal' => '660',
                'descarga_nominal' => '6',
                'tipo_bateria_id' => 2,
                'maquinaria_id' => 3,
                'dispositivo_id' => 2,
                'cantidad_celda' => 24,
                'cantidad_temperatura' => 6,
                'user_register' => 1,
            ],
            [
                'numero_bateria' => 'battery test',
                'siglas' => 'BATTERY TEST',
                'composicion_quimica_id' => 1,
                'marca_id' => 1,
                'modelo_id' => 1,
                'numero_serie' => 'batery-01',
                'voltaje_nominal' => '48',
                'capacidad_nominal' => '660',
                'descarga_nominal' => '6',
                'tipo_bateria_id' => 2,
                'maquinaria_id' => 4,
                'dispositivo_id' => 4,
                'cantidad_celda' => 24,
                'cantidad_temperatura' => 6,
                'user_register' => 1,
            ],
        ];
        foreach ($bateria as $item) {
            Bateria::create($item);
        }
    }
}
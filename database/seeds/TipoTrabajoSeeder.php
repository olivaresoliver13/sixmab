<?php

use Illuminate\Database\Seeder;

use App\Models\TablaSistema\TipoTrabajo;

class TipoTrabajoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_trabajo = [
            [
                'nombre' => 'Respaldo Comunicación',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Respaldo Iluminación',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Respaldo Servidores',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Respaldo General',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Acumulación',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Levantamiento de Carga',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Transporte de Pasajeros',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Otra',
                'user_register' => 1,
            ]
        ];
        foreach ($tipo_trabajo as $item) {
            TipoTrabajo::create($item);
        }
    }
}
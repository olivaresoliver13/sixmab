<?php

use Illuminate\Database\Seeder;

use App\Models\TablaSistema\TipoMaquinaria;

class TipoMaquinariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos_maquinaria = [
            [
                'nombre' => 'Máquina Elevadora',
                'icono' => 'img/maquinaria/maquina.png',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Telecomunicación',
                'icono' => 'fas fa-broadcast-tower',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Tren',
                'icono' => 'fas fa-subway',
                'user_register' => 1,
            ],            
            [
                'nombre' => 'Vehículo',
                'icono' => 'fas fa-car',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Vehículo Carga',
                'icono' => 'fas fa-truck-moving',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Vehículo Pasajero',
                'icono' => 'fas fa-bus-alt',
                'user_register' => 1,
            ]
        ];

        foreach ($tipos_maquinaria as $tipo) {
            TipoMaquinaria::create($tipo);
        }        
    }
}
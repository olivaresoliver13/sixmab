<?php

use Illuminate\Database\Seeder;

use App\Models\Procesos\Maquinaria;

class MaquinariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maquinaria = [
            [
                'codigo' => 'pla_01',
                'siglas' => 'BBS_PLA',
                'planta_id' => 1,
                'tipo_maquinaria_id' => 2,
                'user_register' => 1,
            ],
            [
                'codigo' => 'Tri_75/60v',
                'siglas' => 'ALG_Tri75',
                'planta_id' => 2,
                'tipo_maquinaria_id' => 5,
                'user_register' => 1,
            ],
            [
                'codigo' => 'Eternity_0001',
                'siglas' => 'EteLatam',
                'planta_id' => 3,
                'tipo_maquinaria_id' => 1,
                'user_register' => 1,
            ],
            [
                'codigo' => 'testing machinery',
                'siglas' => 'MACHINERY',
                'planta_id' => 4,
                'tipo_maquinaria_id' => 1,
                'user_register' => 1,
            ],
        ];

        foreach ($maquinaria as $item) {
            Maquinaria::create($item);
        }
    }
}
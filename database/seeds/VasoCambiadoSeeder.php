<?php

use Illuminate\Database\Seeder;

use App\Models\TablaSistema\VasoCambiado;

class VasoCambiadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vaso_cambiado = [
            [
                'nombre' => 'Otro',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Vaso N° 1',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Vaso N° 2',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Vaso N° 3',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Vaso N° 4',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Vaso N° 5',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Vaso N° 6',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Vaso N° 7',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Vaso N° 8',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Vaso N° 9',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Vaso N° 10',
                'user_register' => 1,
            ]
        ];
        foreach ($vaso_cambiado as $item) {
            VasoCambiado::create($item);
        }
    }
}
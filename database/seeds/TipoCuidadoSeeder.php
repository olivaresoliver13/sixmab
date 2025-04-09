<?php

use Illuminate\Database\Seeder;

use App\Models\TablaSistema\TipoCuidado;

class TipoCuidadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_cuidado = [
            [
                'nombre' => 'No Tiene',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Básico',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Intermedio',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Avanzado',
                'user_register' => 1,
            ]
        ];
        foreach ($tipo_cuidado as $item) {
            TipoCuidado::create($item);
        }
    }
}
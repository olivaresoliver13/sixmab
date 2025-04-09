<?php

use Illuminate\Database\Seeder;

use App\Models\TablaSistema\DesbordamientoAcido;

class DesbordamientoAcidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $desbordamiento_acido = [
            [
                'nombre' => 'No Tiene',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Leve',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Mediana',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Grave',
                'user_register' => 1,
            ]
        ];
        foreach ($desbordamiento_acido as $item) {
            DesbordamientoAcido::create($item);
        }
    }
}
<?php

use Illuminate\Database\Seeder;

use App\Models\TablaSistema\NivelBajoElectrolito;

class NivelBajoElectrolitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nivel_bajo_electrolito = [
            [
                'nombre' => 'Vacío',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Medio',
                'user_register' => 1,
            ],
            [
                'nombre' => 'LLeno',
                'user_register' => 1,
            ]
        ];
        foreach ($nivel_bajo_electrolito as $item) {
            NivelBajoElectrolito::create($item);
        }
    }
}
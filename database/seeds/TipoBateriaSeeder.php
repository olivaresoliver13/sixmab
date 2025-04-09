<?php

use Illuminate\Database\Seeder;

use App\Models\TablaSistema\TipoBateria;

class TipoBateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos_bateria = [
            [
                'nombre' => 'Arranque',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Tracción',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Ciclo Profundo',
                'user_register' => 1,
            ],
        ];

        foreach ($tipos_bateria as $tipo) {
            TipoBateria::create($tipo);
        }
    }
}
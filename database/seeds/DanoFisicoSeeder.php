<?php

use Illuminate\Database\Seeder;

use App\Models\TablaSistema\DanoFisico;

class DanoFisicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dano_fisico = [
            [
                'nombre' => 'Sobrecarga',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Exceso de Descarga',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Cortocircuito',
                'user_register' => 1,
            ]
        ];
        foreach ($dano_fisico as $item) {
            DanoFisico::create($item);
        }
    }
}
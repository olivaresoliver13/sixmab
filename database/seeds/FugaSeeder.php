<?php

use Illuminate\Database\Seeder;

use App\Models\TablaSistema\Fuga;

class FugaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fuga = [
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
        foreach ($fuga as $item) {
            Fuga::create($item);
        }
    }
}
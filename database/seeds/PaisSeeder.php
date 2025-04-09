<?php

use Illuminate\Database\Seeder;

use App\Models\TablaSistema\Pais;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pais = [
            [
                'nombre' => 'Chile',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Otro',
                'user_register' => 1,
            ]
        ];
        foreach ($pais as $item) {
            Pais::create($item);
        }
    }
}
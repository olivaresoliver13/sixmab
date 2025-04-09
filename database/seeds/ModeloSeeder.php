<?php

use Illuminate\Database\Seeder;

use App\Models\TablaSistema\Modelo;

class ModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modelo = [
            [
                'nombre' => 'China',
                'user_register' => 1,
            ]
        ];
        foreach ($modelo as $item) {
            Modelo::create($item);
        }
    }
}

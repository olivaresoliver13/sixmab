<?php

use Illuminate\Database\Seeder;

use App\Models\TablaSistema\Marca;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marca = [
            [
                'nombre' => 'Kijo Batteru',
                'user_register' => 1,
            ]
        ];
        foreach ($marca as $item) {
            Marca::create($item);
        }
    }
}

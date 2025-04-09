<?php

use Illuminate\Database\Seeder;

use App\Models\TablaSistema\ComposicionQuimica;

class ComposicionQuimicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nombre' => 'Ácido Plomo',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Níquel Hierro',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Níquel Cadmio',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Níquel Hidruro Metálico',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Iones de Litio',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Polímero de Litio',
                'user_register' => 1,
            ],
        ];

        foreach ($data as $tipo) {
            ComposicionQuimica::create($tipo);
        }
    }
}
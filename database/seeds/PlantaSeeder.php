<?php

use Illuminate\Database\Seeder;

use App\Models\Procesos\Planta;

class PlantaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $planta = [
            [
                'nombre' => 'Placilla',
                'siglas' => 'Placilla',
                'identificador' => '17.890.232-2',
                'telefono1' => '+56 3 2229 8266',
                'email' => 'placilla@biobusiness.cl',
                'direccion' => 'Navarra 51. Llanos de Curauma.',
                'empresa_id' => 1,
                'pais_id' => 1,
                'user_register' => 1,
            ],            
            [
                'nombre' => 'Ñuñoa',
                'siglas' => 'AlgÑuñ',
                'identificador' => '77.209.819-7',
                'telefono1' => '+56 9 4418 9904',
                'email' => 'francisco.diaz@algramo.cl',
                'direccion' => 'Obispo Orrego 609.',
                'empresa_id' => 2,
                'pais_id' => 1,
                'user_register' => 1,
            ],            
            [
                'nombre' => 'Eternity Latinoamerica',
                'siglas' => 'Eternity_Latam',
                'identificador' => '12.121.121-2',
                'telefono1' => '+12 1 2212 1121',
                'email' => 'x.salvador@eternitytechnologies.com',
                'direccion' => 'San Fernando 1145, San Bernando. Santiago..',
                'empresa_id' => 3,
                'pais_id' => 1,
                'user_register' => 1,
            ],            
            [
                'nombre' => 'test plant',
                'siglas' => 'TEST PLANT',
                'identificador' => '11.111.111-1',
                'telefono1' => '+11 1 1111 1111',
                'email' => 'prueba@biobusiness.com',
                'direccion' => 'Prueba',
                'empresa_id' => 4,
                'pais_id' => 1,
                'user_register' => 1,
            ],
        ];

        foreach ($planta as $item) {
            Planta::create($item);
        }
    }
}
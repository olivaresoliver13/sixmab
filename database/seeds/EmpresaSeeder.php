<?php

use Illuminate\Database\Seeder;

use App\Models\Procesos\Empresa;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresa = [
            [
                'nombre' => 'BIOBUSINESS LTDA',
                'siglas' => 'BBS',
                'identificador' => '76.010.463-9',
                'telefono1' => '+56 9 6561 7745',
                'telefono2' => '+56 9 3202 6364',
                'email' => 'german.caru@biobusiness.cl',
                'direccion' => 'Blanco 1041, oficina 50, Valparaíso..',
                'pais_id' => 1,
                'user_register' => 1,
            ],
            [
                'nombre' => 'ALGRAMO',
                'siglas' => 'ALGRAMO',
                'identificador' => '77.209.819-7',
                'telefono1' => '+56 9 6561 7745',
                'email' => 'francisco.diaz@algramo.cl',
                'direccion' => 'Obispo Orrego 608. Ñuñoa. Santiago.',
                'pais_id' => 1,
                'user_register' => 1,
            ],
            [
                'nombre' => 'Eternity Technologies',
                'siglas' => 'ETERNITY',
                'identificador' => '97.172.433-5',
                'telefono1' => '+97 1 7243 3535',
                'email' => 'info@eternitytechnologies.com',
                'direccion' => 'Ras Al Khaimah, en los UAE',
                'pais_id' => 1,
                'user_register' => 1,
            ],
            [
                'nombre' => 'Company Test',
                'siglas' => 'COMPANY TEST',
                'identificador' => '11.111.111-1',
                'telefono1' => '+11 1 1111 1111',
                'email' => 'prueba@biobusiness.com',
                'direccion' => 'Prueba',
                'pais_id' => 1,
                'user_register' => 1,
            ],
        ];
        foreach ($empresa as $item) {
            Empresa::create($item);
        }
    }
}
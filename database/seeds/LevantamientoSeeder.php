<?php

use Illuminate\Database\Seeder;

use App\Models\PasosSixmab\Levantamiento;

class LevantamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levantamiento = [
            [
                'fecha_compra' => 2020,
                'fecha' => '2020-12-07',
                'nota' => 'Sistemas de 60 volts, triciclo eléctrico para el trabajo de transporte de repartición de productos al gramaje.',
                'puente_defectuoso_oxidado' => true,
                'polo_levantado' => false,
                'oxidacion_fuerte' => false,
                'otro' => 'Baterías con sulfato superficial en parte superior.',
                'tipo_trabajo_id' => 8,
                'tipo_cuidado_id' => 2,
                'vaso_cambiado_id' => 1,
                'dano_fisico_id' => 2,
                'fuga_id' => 3,
                'desbordamiento_acido_id' => 3,
                'nivel_bajo_electrolito_id' => 3,
                'bateria_id' => 2,
                'user_register' => 1,
            ]

        ];
        foreach ($levantamiento as $item) {
            Levantamiento::create($item);
        }
    }
}
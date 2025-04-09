<?php

use Illuminate\Database\Seeder;

use App\Models\TablaSistema\TipoPasoSixmab;

class TipoPasoSixmabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos_paso_sixmab = [
            [
                'nombre' => 'Levantamiento',
                'descripcion' => 'Estudio del estado de las baterías, considera chequeo visual, creación de ficha de datos y entrevistas con encargados.',
                'foto' => 'M7GRKMvO3hdDFGuefZbk.png',
                'orden' => '1',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Diagnóstico',
                'descripcion' => 'Evaluaciones de desempeño, test de carga y descarga, clasificaciones según estado, finalizando con un informe y propuesta técnico-económica.',
                'foto' => 'W260WwMeduyU3pGc9Qpg.png',
                'orden' => '2',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Mantención',
                'descripcion' => 'Ejecutar medidas correctivas, como cambios de electrodos y vasos, cambios de electrolitos y limpieza de corrosión.',
                'foto' => 'p6dzqwjzlnnoPaaIs2fL.png',
                'orden' => '3',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Regeneración',
                'descripcion' => 'Etapa de reutilización de la batería, por medio de la regeneración, se condiciona la batería para volver a un punto óptimo de desempeño, tanto en baterías nuevas (preventiva), como en baterías dañadas (correctiva).',
                'foto' => 'cDdSBTKRm3qjXuSQxZsY.png',
                'orden' => '4',
                'user_register' => 1,
            ],
            [
                'nombre' => 'Monitoreo en Línea',
                'descripcion' => 'Visualización de información, en tiempo real, referente al desempeño de la batería. Mediante un servicio web, el cliente puede estar al tanto del estado de la batería, para realizar una gestión eficiente sobre este activo.',
                'foto' => 'cBdw1B78SAvdE0g2rHZZ.png',
                'orden' => '5',   
                'user_register' => 1,        
            ],
            [
                'nombre' => 'Disposición Final',
                'descripcion' => 'Proceso de revalorización de la batería, posterior a su vida útil. Este proceso, entrega un valor a cada componente del residuo, comprometiendo el tratamiento, almacenamiento y venta de los subproductos y componentes de los residuos.',
                'foto' => 'd90YhgJnY0cR1d5SoKNf.png',
                'orden' => '6',
                'user_register' => 1,
            ]
        ];

        foreach ($tipos_paso_sixmab as $tipo) {
            TipoPasoSixmab::create($tipo);
        }
    }
}
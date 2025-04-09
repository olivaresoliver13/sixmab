<?php

use Illuminate\Database\Seeder;

use App\Models\Noticias\Noticia;

class NoticiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $noticia = [
            [
                'titulo' => 'Biobusiness',
                'entradilla' => 'Te presentamos nuestra nueva web! Hecha para ti, más dinámica y completa con el fin de que tengas una experiencia aún más directa y práctica a la hora de acceder a los contenidos e información.',
                'texto1' => '¡Te presentamos nuestra nueva web! Hecha para ti, más dinámica y completa con el fin de que tengas una experiencia aún más directa y práctica a la hora de acceder a los contenidos e información.',
                'texto2' => 'Esperamos que a través de esta nueva herramienta PHP_EOL podamos trasmitirte información útil.',
                'texto3' => 'Y por supuesto, cualquier comentario o sugerencia que quieras hacernos para enriquecer este nuevo espacio virtual será bienvenida, ya que siempre queremos mejorar nuestra comunicación con los usuarios.',    
                'autor' => 'Biobusiness',
                'link' => 'https://biobusiness.cl',
                'foto' => 'KIPC3FT1A7EEkDxksZVU.png',
                'user_register' => 1,
            ],
            [
                'titulo' => 'Sixmab',
                'entradilla' => 'Le presentamos nuestra nueva web! Hecha para ti, más dinámica y completa con el fin de que tengas una experiencia aún más directa y práctica a la hora de acceder a los contenidos e información.',
                'texto1' => '¡Te presentamos nuestra nueva web! Hecha para ti, más dinámica y completa con el fin de que tengas una experiencia aún más directa y práctica a la hora de acceder a los contenidos e información.',
                'texto2' => 'Esperamos que a través de esta nueva herramienta PHP_EOL podamos trasmitirte información útil.',
                'texto3' => 'Y por supuesto, cualquier comentario o sugerencia que quieras hacernos para enriquecer este nuevo espacio virtual será bienvenida, ya que siempre queremos mejorar nuestra comunicación con los usuarios.',                  
                'autor' => 'Sixmab',
                'link' => 'https://sixmab.cl',
                'foto' => 'tcpZ4WwzNTwMAjaoVTD0.png',
                'user_register' => 1,
            ]
        ];

        foreach ($noticia as $item) {
            Noticia::create($item);
        }
    }
}

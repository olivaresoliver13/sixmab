<?php

use Illuminate\Database\Seeder;

class PasoSixmaBateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pasosixmab_bateria')->insert([
            [
                'bateria_id' => 1,
                'tipo_paso_sixmab_id' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'bateria_id' => 1,
                'tipo_paso_sixmab_id' => 2,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'bateria_id' => 1,
                'tipo_paso_sixmab_id' => 3,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'bateria_id' => 1,
                'tipo_paso_sixmab_id' => 4,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'bateria_id' => 1,
                'tipo_paso_sixmab_id' => 5,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'bateria_id' => 1,
                'tipo_paso_sixmab_id' => 6,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],            
            [
                'bateria_id' => 2,
                'tipo_paso_sixmab_id' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'bateria_id' => 2,
                'tipo_paso_sixmab_id' => 2,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'bateria_id' => 2,
                'tipo_paso_sixmab_id' => 4,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'bateria_id' => 2,
                'tipo_paso_sixmab_id' => 5,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'bateria_id' => 3,
                'tipo_paso_sixmab_id' => 5,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'bateria_id' => 4,
                'tipo_paso_sixmab_id' => 5,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
        ]);   
    }
}
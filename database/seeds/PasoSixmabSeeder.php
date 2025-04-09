<?php

use Illuminate\Database\Seeder;

use App\Models\Procesos\PasoSixmab;

class PasoSixmabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paso_sixmab')->insert([
            [
                'empresa_id' => 1,
                'tipo_paso_sixmab_id' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'empresa_id' => 1,
                'tipo_paso_sixmab_id' => 2,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'empresa_id' => 1,
                'tipo_paso_sixmab_id' => 3,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'empresa_id' => 1,
                'tipo_paso_sixmab_id' => 4,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'empresa_id' => 1,
                'tipo_paso_sixmab_id' => 5,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'empresa_id' => 1,
                'tipo_paso_sixmab_id' => 6,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],            
            [
                'empresa_id' => 2,
                'tipo_paso_sixmab_id' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'empresa_id' => 2,
                'tipo_paso_sixmab_id' => 2,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'empresa_id' => 2,
                'tipo_paso_sixmab_id' => 4,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'empresa_id' => 2,
                'tipo_paso_sixmab_id' => 5,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'empresa_id' => 3,
                'tipo_paso_sixmab_id' => 5,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'empresa_id' => 4,
                'tipo_paso_sixmab_id' => 5,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
        ]);   
    }
}
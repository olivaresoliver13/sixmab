<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTablas([
            'roles', 
            'permissions',
            'permission_role',
            'users',
            'role_user',
            'pais',  	    
            'empresa',
            'planta',
            'tipo_maquinaria',
            'maquinaria',
            'tipo_bateria',
            'tipo_paso_sixmab',
            'composicion_quimica',
            'dispositivo',
            'bateria',
            'noticia',
            'paso_sixmab',
            'pasosixmab_bateria',
            'detalle_dispositivo',
            'tipo_trabajo',   
            'tipo_cuidado',
            'vaso_cambiado',
            'dano_fisico',
            'fuga',
            'desbordamiento_acido',
            'nivel_bajo_electrolito',
            'levantamiento',
            'marca',
            'modelo',
            'usuario_empresa'
        ]);        
        $this->call(RolSeeder::class);
        $this->call(PermisoSeeder::class);
        $this->call(PermisoRolSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(RolUsuarioSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(PlantaSeeder::class);
        $this->call(TipoMaquinariaSeeder::class);
        $this->call(MaquinariaSeeder::class);
        $this->call(TipoBateriaSeeder::class);
        $this->call(TipoPasoSixmabSeeder::class);
        $this->call(ComposicionQuimicaSeeder::class);
        $this->call(DispositivoSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(ModeloSeeder::class);
        $this->call(BateriaSeeder::class);
        $this->call(NoticiaSeeder::class);
        $this->call(PasoSixmabSeeder::class);
        $this->call(PasoSixmaBateriaSeeder::class);
        $this->call(DetalleDispositivoSeeder::class);
        $this->call(TipoTrabajoSeeder::class);
        $this->call(TipoCuidadoSeeder::class);
        $this->call(VasoCambiadoSeeder::class);
        $this->call(DanoFisicoSeeder::class);
        $this->call(FugaSeeder::class);
        $this->call(DesbordamientoAcidoSeeder::class);
        $this->call(NivelBajoElectrolitoSeeder::class);
        $this->call(LevantamientoSeeder::class);
        $this->call(UsuarioEmpresaSeeder::class);
    }
    protected function truncateTablas(array $tablas)
    {
        Schema::disableForeignKeyConstraints(0);
        foreach ($tablas as $tabla) {
            DB::table($tabla)->truncate();
        }
        Schema::disableForeignKeyConstraints(1);
    }
}
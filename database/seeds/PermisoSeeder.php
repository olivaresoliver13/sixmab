<?php

use Illuminate\Database\Seeder;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            
            [
                'name'          => 'Home Navegar',
                'slug'          => 'home.index',
                'description'   => 'Ingresa al Panel de Control',
                'user_register' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'name'          => 'Home User',
                'slug'          => 'dashboard-user.index',
                'description'   => 'Ingresa al Panel de Control User',
                'user_register' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'name'          => 'Seguridad Navegar',
                'slug'          => 'seguridad.index',
                'description'   => 'Ingresa a la seguridad del sistema',
                'user_register' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'name'          => 'Configuración Navegar',
                'slug'          => 'configuracion.index',
                'description'   => 'Ingresa a la configuración del sistema',
                'user_register' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'name'          => 'Módulos Navegar',
                'slug'          => 'modulos.index',
                'description'   => 'Navega los modulos del sistema',
                'user_register' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'name'          => 'Informes Navegar',
                'slug'          => 'informes.index',
                'description'   => 'Navega los informes del sistema',
                'user_register' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'name'          => 'Mantenimiento Navegar',
                'slug'          => 'mantenimiento.index',
                'description'   => 'Lista y navega modulo de mantenimiento del sistema',
                'user_register' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],     

            // ----------------------------------------------------------- Módulo de Seguridad -------- //

                // ----------------------------------------------------------- Módulo Usuario
                    [
                        'name'          => 'Usuario Navegar',
                        'slug'          => 'usuarios.index',
                        'description'   => 'Ingresa al módulo de usuario',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Usuario Detalle',
                        'slug'          => 'usuarios.show',
                        'description'   => 'Ver el detalle del usuario',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Usuario Crear',
                        'slug'          => 'usuarios.create',
                        'description'   => 'Crea un nuevo usuario',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Usuario Editar',
                        'slug'          => 'usuarios.edit',
                        'description'   => 'Edita un usuario',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Usuario Eliminar',
                        'slug'          => 'usuarios.destroy',
                        'description'   => 'Elimina un usuario',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Usuario Estado',
                        'slug'          => 'usuarios.inhabilitar',
                        'description'   => 'Activa y desactiva usuario',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                // ----------------------------------------------------------- Fin del Módulo Usuario

                // ----------------------------------------------------------- Módulo Rol
                    [
                        'name'          => 'Rol Navegar',
                        'slug'          => 'roles.index',
                        'description'   => 'Ingresa al módulo rol',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Rol Detalle',
                        'slug'          => 'roles.show',
                        'description'   => 'Ver el detalle del rol',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Rol Crear',
                        'slug'          => 'roles.create',
                        'description'   => 'Crea un nuevo rol',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Rol Editar',
                        'slug'          => 'roles.edit',
                        'description'   => 'Edita un rol',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Rol Eliminar',
                        'slug'          => 'roles.destroy',
                        'description'   => 'Elimina un rol',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                // ----------------------------------------------------------- Fin del Módulo Rol

                // ----------------------------------------------------------- Módulo Permiso
                    [
                        'name'          => 'Permiso Navegar',
                        'slug'          => 'permisos.index',
                        'description'   => 'Ingresa al módulo de permiso',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Permiso Detalle',
                        'slug'          => 'permisos.show',
                        'description'   => 'Ver el detalle del permiso',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Permiso Crear',
                        'slug'          => 'permisos.create',
                        'description'   => 'Crea un nuevo permiso',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Permiso Editar',
                        'slug'          => 'permisos.edit',
                        'description'   => 'Edita un permiso',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Permiso Eliminar',
                        'slug'          => 'permisos.destroy',
                        'description'   => 'Elimina un permiso',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                // ----------------------------------------------------------- Fin del Módulo Permiso

                // ----------------------------------------------------------- Módulo Permiso-Rol
                    [
                        'name'          => 'Permiso Rol Navegar',
                        'slug'          => 'permisos_roles.index',
                        'description'   => 'Ingresa al módulo permiso rol',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Permiso Rol Guardar',
                        'slug'          => 'guardar_permiso_rol.store',
                        'description'   => 'Guardar permiso rol',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                // ----------------------------------------------------------- Fin del Módulo Permiso-Rol

                // ----------------------------------------------------------- Módulo Sesiones
                    [
                        'name'          => 'Sesiones Navegar',
                        'slug'          => 'secciones.index',
                        'description'   => 'Ingresa al módulo de Sesiones',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    
                // ----------------------------------------------------------- Fin del Módulo Sesiones

            // ----------------------------------------------------------- Fin del módulo de Seguridad  -------- //

            // ----------------------------------------------------------- Módulo Procesos -------- //

                // ----------------------------------------------------------- Módulo Empresa
                    [
                        'name'          => 'Empresa Navegar',
                        'slug'          => 'empresas.index',
                        'description'   => 'Ingresa al módulo de empresa',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Empresa Detalle',
                        'slug'          => 'empresas.show',
                        'description'   => 'Ver en detalle de la empresa',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Empresa Crear',
                        'slug'          => 'empresas.create',
                        'description'   => 'Crea una nueva empresa',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Empresa Editar',
                        'slug'          => 'empresas.edit',
                        'description'   => 'Edita una empresa',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Empresa Eliminar',
                        'slug'          => 'empresas.destroy',
                        'description'   => 'Elimina una empresa',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Empresa Estado',
                        'slug'          => 'empresas.inhabilitar',
                        'description'   => 'Activa y desactiva una empresa',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Pasos Sixmab',
                        'slug'          => 'pasosixmab.index',
                        'description'   => 'Muestra los Pasos Sixmab',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                // ----------------------------------------------------------- Fin del Módulo Empresa

                // ----------------------------------------------------------- Módulo Planta
                    [
                        'name'          => 'Planta Navegar',
                        'slug'          => 'plantas.index',
                        'description'   => 'Ingresa al módulo de planta',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Planta Detalle',
                        'slug'          => 'plantas.show',
                        'description'   => 'Ver el detalle de la planta',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Planta Crear',
                        'slug'          => 'plantas.create',
                        'description'   => 'Crea una nueva planta',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Planta Editar',
                        'slug'          => 'plantas.edit',
                        'description'   => 'Edita una planta',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Planta Eliminar',
                        'slug'          => 'plantas.destroy',
                        'description'   => 'Elimina una planta',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Planta Estado',
                        'slug'          => 'plantas.inhabilitar',
                        'description'   => 'Activa y desactiva una planta',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Planta Ver Baterías',
                        'slug'          => 'baterias.bateria',
                        'description'   => 'Ir a la baterías',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                // ----------------------------------------------------------- Fin del Módulo Planta

                // ----------------------------------------------------------- Módulo Maquinaria
                    [
                        'name'          => 'Maquinaria Navegar',
                        'slug'          => 'maquinarias.index',
                        'description'   => 'Ingresa al módulo maquinaria',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Maquinaria Detalle',
                        'slug'          => 'maquinarias.show',
                        'description'   => 'Ver el detalle de la maquinaria',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Maquinaria Crear',
                        'slug'          => 'maquinarias.create',
                        'description'   => 'Crear una nueva maquinaria',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Maquinaria Editar',
                        'slug'          => 'maquinarias.edit',
                        'description'   => 'Edita una maquinaria',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Maquinaria Eliminar',
                        'slug'          => 'maquinarias.destroy',
                        'description'   => 'Elimina una maquinaria',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Maquinaria Estado',
                        'slug'          => 'maquinarias.inhabilitar',
                        'description'   => 'Activa y desactiva una maquinaria',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                // ----------------------------------------------------------- Fin del Módulo Maquinaria

                // ----------------------------------------------------------- Módulo Batería
                    [
                        'name'          => 'Batería Navegar',
                        'slug'          => 'baterias.index',
                        'description'   => 'Ingresa al módulo de batería',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Batería Detalle',
                        'slug'          => 'baterias.show',
                        'description'   => 'Ver el detalle de la batería',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Batería Crear',
                        'slug'          => 'baterias.create',
                        'description'   => 'Crea una nueva batería',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Batería Editar',
                        'slug'          => 'baterias.edit',
                        'description'   => 'Edita una batería',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Batería Eliminar',
                        'slug'          => 'baterias.destroy',
                        'description'   => 'Elimina una batería',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Batería Estado',
                        'slug'          => 'baterias.inhabilitar',
                        'description'   => 'Activa y desactiva una batería',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Batería Configurar Dispositivo',
                        'slug'          => 'Configurar.dispositivo',
                        'description'   => 'Configura el dispositivo con las celdas',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                // ----------------------------------------------------------- Fin del Módulo Batería

            // ----------------------------------------------------------- Fin del módulo Procesos -------- //

            // ----------------------------------------------------------- Módulo Dispositivo -------- //

                [
                    'name'          => 'Dispositivo Navegar',
                    'slug'          => 'dispositivos.index',
                    'description'   => 'Ingresa al módulo dispositivo',
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                    'name'          => 'Dispositivo Detalle',
                    'slug'          => 'dispositivos.show',
                    'description'   => 'Ver el detalle del dispositivo',  
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                    'name'          => 'Dispositivo Crear',
                    'slug'          => 'dispositivos.create',
                    'description'   => 'Crea un nuevo dispositivo',
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                    'name'          => 'Dispositivo Editar',
                    'slug'          => 'dispositivos.edit',
                    'description'   => 'Edita un dispositivo',
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                    'name'          => 'Dispositivo Eliminar',
                    'slug'          => 'dispositivos.destroy',
                    'description'   => 'Elimina un dispositivo',  
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                    'name'          => 'Dispositivo Estado',
                    'slug'          => 'dispositivos.inhabilitar',
                    'description'   => 'Activa y desactiva un dispositivo',  
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],

            // ----------------------------------------------------------- Fin del Módulo Dispositivo -------- //

            // ----------------------------------------------------------- Módulo Noticia -------- //

                [
                    'name'          => 'Noticias Navegar',
                    'slug'          => 'noticias.index',
                    'description'   => 'Ingresa al módulo noticia',
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                    'name'          => 'Noticias Detalle',
                    'slug'          => 'noticias.show',
                    'description'   => 'Ve el detalle de la noticia',  
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                    'name'          => 'Noticias Crear',
                    'slug'          => 'noticias.create',
                    'description'   => 'Crea una nueva noticia',
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                    'name'          => 'Noticias Editar',
                    'slug'          => 'noticias.edit',
                    'description'   => 'Edita una noticia',
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                    'name'          => 'Noticias Eliminar',
                    'slug'          => 'noticias.destroy',
                    'description'   => 'Elimina una noticia',  
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                    'name'          => 'Noticias Estado',
                    'slug'          => 'noticias.inhabilitar',
                    'description'   => 'Activa y desactiva una noticia',  
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],

            // ----------------------------------------------------------- Fin del Módulo Noticia -------- //

            // ----------------------------------------------------------- Módulo Logs -------- //

                [
                    'name'          => 'Logs Navegar',
                    'slug'          => 'logs.index',
                    'description'   => 'Lista y navega todos los logs del sistema',
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],

            // ----------------------------------------------------------- Fin del Módulo Logs -------- //

            // ----------------------------------------------------------- Módulo Tablas del Sistema -------- //

                // ----------------------------------------------------------- Módulo de Composición Química
                    [
                        'name'          => 'Composición Química Navegar',
                        'slug'          => 'composicion_quimica.index',
                        'description'   => 'Ingresa una composición química',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Composición Química Detalle',
                        'slug'          => 'composicion_quimica.show',
                        'description'   => 'Ver el detalle de una composición química',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Composición Química Crear',
                        'slug'          => 'composicion_quimica.create',
                        'description'   => 'Crea una composición química',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Composición Química Editar',
                        'slug'          => 'composicion_quimica.edit',
                        'description'   => 'Edita una composición química',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Composición Química Eliminar',
                        'slug'          => 'composicion_quimica.destroy',
                        'description'   => 'Elimina una composición química',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Composición Química Estado',
                        'slug'          => 'composicion_quimica.inhabilitar',
                        'description'   => 'Activa y desactiva una composición química',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                // ----------------------------------------------------------- Fin del Módulo Composición Química

                // ----------------------------------------------------------- Módulo Tipos de Batería
                    [
                        'name'          => 'Tipos de Batería Navegar',
                        'slug'          => 'tipos_baterias.index',
                        'description'   => 'Ingresa un tipo de batería',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Tipos de Batería Detalle',
                        'slug'          => 'tipos_baterias.show',
                        'description'   => 'Ver el detalle de un tipo de batería',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Tipos de Batería Crear',
                        'slug'          => 'tipos_baterias.create',
                        'description'   => 'Crea un tipo de batería',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Tipos de Batería Editar',
                        'slug'          => 'tipos_baterias.edit',
                        'description'   => 'Edita un tipo de batería',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Tipos de Batería Eliminar',
                        'slug'          => 'tipos_baterias.destroy',
                        'description'   => 'Elimina un tipo de batería',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Tipos de Batería Estado',
                        'slug'          => 'tipos_baterias.inhabilitar',
                        'description'   => 'Activa y desactiva un tipo de batería',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                // ----------------------------------------------------------- Fin del Módulo Tipos de Batería

                // ----------------------------------------------------------- Módulo Tipo de Maquinarias
                    [
                        'name'          => 'Tipo de Maquinaria Navegar',
                        'slug'          => 'tipos_maquinarias.index',
                        'description'   => 'Ingresa al módulo tipo de maquinaria',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Tipo de Maquinaria Detalle',
                        'slug'          => 'tipos_maquinarias.show',
                        'description'   => 'Ver el detalle del tipo de maquinaria',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Tipo de Maquinaria Crear',
                        'slug'          => 'tipos_maquinarias.create',
                        'description'   => 'Crea un nuevo tipo de maquinaria',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Tipo de Maquinaria Editar',
                        'slug'          => 'tipos_maquinarias.edit',
                        'description'   => 'Edita un tipo de maquinaria',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Tipo de Maquinaria Eliminar',
                        'slug'          => 'tipos_maquinarias.destroy',
                        'description'   => 'Elimina un tipo de maquinaria',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Tipo de Maquinaria Estado',
                        'slug'          => 'tipos_maquinarias.inhabilitar',
                        'description'   => 'Activa y desactiva un tipo de maquinaria',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                // ----------------------------------------------------------- Fin del Módulo Tipo de Maquinaria

                // ----------------------------------------------------------- Módulo Tipo de Paso SIXMAB
                    [
                        'name'          => 'Tipo de Paso Sixmab Navegar',
                        'slug'          => 'tipos_pasosixmab.index',
                        'description'   => 'Ingresa el módulo tipo de paso sixmab',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Tipo de Paso Sixmab Detalle',
                        'slug'          => 'tipos_pasosixmab.show',
                        'description'   => 'Ver el detalle tipo de paso sixmab',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Tipo de Paso Sixmab Crear',
                        'slug'          => 'tipos_pasosixmab.create',
                        'description'   => 'Crea un nuevo tipo de paso sixmab',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Tipo de Paso Sixmab Editar',
                        'slug'          => 'tipos_pasosixmab.edit',
                        'description'   => 'Edita un tipo de paso sixmab',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Tipo de Paso Sixmab Eliminar',
                        'slug'          => 'tipos_pasosixmab.destroy',
                        'description'   => 'Elimina un tipo de paso sixmab',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Tipo de Paso Sixmab Estado',
                        'slug'          => 'tipos_pasosixmab.inhabilitar',
                        'description'   => 'Activa y desactiva un tipo de paso sixmab',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                // ----------------------------------------------------------- Fin del Módulo Tipo de Paso SIXMAB
    
            // ----------------------------------------------------------- Fin del módulo Tablas del Sistema -------- //

            // ----------------------------------------------------------- Módulo Pasos Sixmab -------- //
            
                // ----------------------------------------------------------- Módulo Levantamiento
                    [
                        'name'          => 'Levantamiento Navegar',
                        'slug'          => 'levantamiento.index',
                        'description'   => 'Ingresa al módulo de levantamiento',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Levantamiento Crear',
                        'slug'          => 'levantamiento.create',
                        'description'   => 'Crea un nuevo levantamiento',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Levantamiento Editar',
                        'slug'          => 'levantamiento.edit',
                        'description'   => 'Edita un levantamiento',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Levantamiento Eliminar',
                        'slug'          => 'levantamiento.destroy',
                        'description'   => 'Elimina un levantamiento',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                // ----------------------------------------------------------- Fin del Módulo Levantamiento

                // ----------------------------------------------------------- Módulo Diagnóstico
                    [
                        'name'          => 'Diagnóstico Navegar',
                        'slug'          => 'diagnostico.index',
                        'description'   => 'Ingresa al módulo de diagnóstico',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Diagnóstico Crear',
                        'slug'          => 'diagnostico.create',
                        'description'   => 'Crea un nuevo diagnóstico',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Diagnóstico Editar',
                        'slug'          => 'diagnostico.edit',
                        'description'   => 'Edita un diagnóstico',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Diagnóstico Eliminar',
                        'slug'          => 'diagnostico.destroy',
                        'description'   => 'Elimina un diagnóstico',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                // ----------------------------------------------------------- Fin del Módulo Diagnóstico

                // ----------------------------------------------------------- Módulo Regeneración
                    [
                        'name'          => 'Regeneración Navegar',
                        'slug'          => 'regeneracion.index',
                        'description'   => 'Ingresa al módulo de regeneración',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Regeneración Crear',
                        'slug'          => 'regeneracion.create',
                        'description'   => 'Crea una nueva regeneración',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Regeneración Editar',
                        'slug'          => 'regeneracion.edit',
                        'description'   => 'Edita una regeneración',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                    [
                        'name'          => 'Regeneración Eliminar',
                        'slug'          => 'regeneracion.destroy',
                        'description'   => 'Elimina una regeneración',  
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                // ----------------------------------------------------------- Fin del Módulo Regeneración
            
            // ----------------------------------------------------------- Fin del módulo Pasos Sixmab -------- //

            // ----------------------------------------------------------- Módulo Alarmas -------- //

                // Módulo Alarmas
                    [
                        'name'          => 'Alarmas Navegar',
                        'slug'          => 'alarma.index',
                        'description'   => 'Lista y navega todos las alarmas del sistema',
                        'user_register' => 1,
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ],
                // Fin del Módulo Alarmas

            // ----------------------------------------------------------- Fin del módulo Alarmas -------- //

            // ----------------------------------------------------------- Módulo Reportes -------- //

                [
                    'name'          => 'Reportes Navegar',
                    'slug'          => 'reportes.index',
                    'description'   => 'Lista y navega todos los reportes del sistema',
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],

            // ----------------------------------------------------------- Fin del módulo Reportes -------- //

            // ----------------------------------------------------------- Módulo Monitoreo -------- //

                [
                    'name'          => 'Monitoreo Navegar',
                    'slug'          => 'monitoreo.index',
                    'description'   => 'Navega el monitoreo de la bateria',
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                    'name'          => 'Monitoreo Celdas Navegar',
                    'slug'          => 'monitoreo.celdas',
                    'description'   => 'Navega el monitoreo de las celdas de una bateria',
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                    'name'          => 'Monitoreo Celda Navegar',
                    'slug'          => 'monitoreo.celda',
                    'description'   => 'Navega el monitoreo cada celda de una bateria',
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],

            // ----------------------------------------------------------- Fin del módulo Monitoreo -------- //

            // ----------------------------------------------------------- Módulo Celda  -------- //

                [
                    'name'          => 'Celda Navegar',
                    'slug'          => 'celdas.index',
                    'description'   => 'Ingresa al módulo celda',
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                    'name'          => 'Celda Detalle',
                    'slug'          => 'celdas.show',
                    'description'   => 'Ver el detalle celda',  
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                    'name'          => 'Celda Crear',
                    'slug'          => 'celdas.create',
                    'description'   => 'Crea una nueva celda',
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                    'name'          => 'Celda Editar',
                    'slug'          => 'celdas.edit',
                    'description'   => 'Edita una celda',
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                    'name'          => 'Celda Eliminar',
                    'slug'          => 'celdas.destroy',
                    'description'   => 'Elimina una celda',  
                    'user_register' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ],

            // ----------------------------------------------------------- Fin del Módulo Celda -------- //
        ]); 
    }
}
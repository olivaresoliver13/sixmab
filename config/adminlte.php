<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'sixmab',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => '<b>sixmab</b>',
    'logo_img' => 'vendor/adminlte/dist/img/logo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'sixmab',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-green',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    // 'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#71-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => 'Enables',
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => true,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#721-authentication-views-classes
    |
    */

    'classes_auth_card' => '' ,
    'classes_auth_header' => 'bg-success' ,
    'classes_auth_body' => '' ,
    'classes_auth_footer' => 'text-center' ,
    'classes_auth_icon' => 'fa-lg text -info' ,
    'classes_auth_btn ' => ' btn-flat btn-primary' ,

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#722-admin-panel-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => 'container-fluid',
    'classes_content' => 'container-fluid',
    'classes_sidebar' => 'sidebar-dark-green elevation-4',  // color de la posición de los iconos
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-green navbar-light', // color de la barra de navegación
    'classes_topnav_nav' => 'navbar-expand-md',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#73-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => true,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#74-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => true,
    'right_sidebar_icon' => 'fas fa-hands-helping',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => false,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    'password_reset_url' => 'password/reset',

    'password_email_url' => 'password/email',

    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#92-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#8-menu-configuration
    |
    */

    'menu' => [
        [
            'text' => 'Tablero de Control',
            'icon'    => 'fas fa-tachometer-alt',
            'icon_color' => 'White',
            'can'  => 'home.index',
            'submenu' => [
                [
                    'text'    => 'Home Control',                   
                    'url'  => 'home',
                    'icon' => 'fas fa-tv',
                    'icon_color' => 'White',
                    'can'  => 'home.index',  
                ],
                [
                    'text'    => 'User Control',                   
                    'url'  => 'dashboard-user',
                    'icon' => 'fas fa-chalkboard-teacher',
                    'icon_color' => 'White',
                    'can'  => 'dashboard-user.index',  
                ],
            ],
        ],
        [   
            'header' => 'Configuración',
            'can'  => 'configuracion.index',
        ],
        [
            'text'    => 'Seguridad',
            'icon'    => 'fas fa-cogs',
            'icon_color' => 'White',
            'can'  => 'seguridad.index',
            'submenu' => [
                [
                    'text' => 'Usuarios',
                    'url'  => 'usuarios',
                    'icon'    => 'fas fa-users',
                    'icon_color' => 'White',
                    'can'  => 'usuarios.index', 
                ],
                [
                    'text' => 'Roles',
                    'url'  => 'roles',
                    'icon'    => 'fas fa-user-tag',
                    'icon_color' => 'White',
                    'can'  => 'roles.index',
                   
                ],
                [
                    'text' => 'Permisos',
                    'url'  => 'permisos',
                    'icon'    => 'fas fa-unlock',
                    'icon_color' => 'White',
                    'can'  => 'permisos.index',
                ],
                [
                    'text' => 'Permisos Roles',
                    'url'  => 'permisos_roles',
                    'icon' => 'fas fa-users-cog',
                    'icon_color' => 'White',
                    'can'  => 'permisos_roles.index',
                ],
                [
                    'text' => 'Secciones',
                    'url'  => 'sessions',
                    'icon'    => 'fas fa-user-shield',
                    'icon_color' => 'White',
                    'can'  => 'secciones.index', 
                ],
            ],
        ],
        [   
            'header' => 'Modulos',
            'can'  => 'modulos.index',
        ],
        [
            'text' => 'Empresas',
            'url'  => 'empresas',
            'icon' => 'fas fa-building',
            'icon_color' => 'White',
            'can'  => 'empresas.index', 
        ],
        [
            'text' => 'Dispositivos',
            'url'  => 'dispositivos',
            'icon' => 'fas fa-box',
            'icon_color' => 'White',
            'can'  => 'dispositivos.index', 
        ],
        [
            'text' => 'Noticias',
            'url'  => 'noticias',
            'icon' => 'far fa-newspaper',
            'icon_color' => 'White',
            'can'  => 'noticias.index', 
        ],
        [   
            'header' => 'Informes',
            'can'  => 'informes.index',
        ],
        [
            'text' => 'Reportes',
            'url'  => 'reportes',
            'icon' => 'fas fa-file',
            'icon_color' => 'White',
            'can'  => 'reportes.index', 
            'submenu' => [
                [
                    'text' => 'Medición Online',
                    'url'  => 'reportes',
                    'icon'    => 'fas fa-chart-pie',
                    'icon_color' => 'White',
                    'can'  => '', 
                ],
                [
                    'text' => 'Medición  de Datos',
                    'url'  => 'datos',
                    'icon'    => 'fas fa-chart-pie',
                    'icon_color' => 'White',
                    'can'  => 'datos.index', 
                ],
                // [
                //     'text' => 'Empresas',
                //     'url'  => 'reportes/empresas',
                //     'icon'    => 'fas fa-users',
                //     'icon_color' => 'White',
                //     'can'  => '', 
                // ],
                // [
                //     'text' => 'Plantas',
                //     'url'  => 'reportes/plantas',
                //     'icon'    => 'fas fa-user-tag',
                //     'icon_color' => 'White',
                //     'can'  => '',
                   
                // ],
                // [
                //     'text' => 'Sistemas',
                //     'url'  => 'reportes/sistemas',
                //     'icon'    => 'fas fa-unlock',
                //     'icon_color' => 'White',
                //     'can'  => '',
                // ],
                // [
                //     'text' => 'Baterías',
                //     'url'  => 'reportes/baterias',
                //     'icon' => 'fas fa-users-cog',
                //     'icon_color' => 'White',
                //     'can'  => '',
                // ],
                // [
                //     'text' => 'Monitoreo Online',
                //     'url'  => 'reportes/monitoreo-mediciones',
                //     'icon' => 'fa fa-bar-chart-o',
                //     'icon_color' => 'White',
                //     'can'  => '',
                // ],
               
             ],
        ],
        [
            'text'        => 'Alarmas',
            'url'         => 'alarmas',
            'icon'        => 'fas fa-bell',
            'icon_color' => 'White', 
            'can'  => 'alarma.index', 
        ],
        [
            'text'        => 'Historial de Log',
            'url'         => 'logs',
            'icon'        => 'fas fa-clipboard',
            'icon_color' => 'White',
            'can'  => 'logs.index',  
        ],
        [   
            'header' => 'Mantenimiento',
            'can'  => 'mantenimiento.index',
        ],
        [
            'text'    => 'Tablas del Sistema',
            'icon'    => 'fas fa-cog',
            'can'  => 'mantenimiento.index',
            'icon_color' => 'White',
            'submenu' => [
                [
                    'text' => 'Composición Química',
                    'url'  => 'composicion_quimica',
                    'icon'    => 'fas fa-atom',
                    'icon_color' => 'White',
                    'can'  => 'composicion_quimica.index', 
                ],
                [
                    'text' => 'Tipos de Batería',
                    'url'  => 'tipos_baterias',
                    'icon'    => 'fas fa-car-battery',
                    'icon_color' => 'White',
                    'can'  => 'tipos_baterias.index', 
                ],
                [
                    'text' => 'Tipos de Maquinaria',
                    'url'  => 'tipos_maquinarias',
                    'icon'    => 'fas fa-bus',
                    'icon_color' => 'White',
                    'can'  => 'tipos_maquinarias.index', 
                ],
                [
                    'text' => 'Tipos Pasos SIXMAB',
                    'url'  => 'tipos_pasosixmab',
                    'icon'    => 'fab fa-stripe-s',
                    'icon_color' => 'White',
                    'can'  => 'tipos_pasosixmab.index', 
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#83-custom-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#91-plugins
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#93-livewire
    */

    'livewire' => false,
];

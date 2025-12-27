<?php

return [

    'title' => 'Sisfact Inventarios',
    'title_prefix' => 'PPD | ',
    'title_postfix' => ' | ' . date('Y'),

    'use_ico_only' => false,
    'use_full_favicon' => false,

    'logo' => '<b>SISFACT</b> P.P.D',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_alt' => 'Logo Facturación',

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,
    'disable_darkmode_routes' => false,

    'preloader' => [
        'enabled' => true,
        'mode' => 'fullscreen',
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'AdminLTE Preloader Image',
            'effect' => 'animation__shake',
            'width' => 60,
            'height' => 60,
        ],
    ],

    'layout_fixed_sidebar' => true,
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'sidebar_nav_accordion' => true,

    'menu' => [
        // Sidebar botones simples

        ['header' => 'USUARIOS Y PROVEEDORES'],
        [
            'text' => 'Usuarios',
            'url' => 'users',
            'icon' => 'fas fa-fw fa-user-cog',
        ],
        [
            'text' => 'Proveedores',
            'url' => 'proveedors',
            'icon' => 'fas fa-fw fa-truck',
        ],

        ['header' => 'CIUDADES Y TIPOS DE DOCUMENTO'],
        [
            'text' => 'Ciudades',
            'url' => 'ciudads',
            'icon' => 'fas fa-fw fa-city',
        ],
        [
            'text' => 'Tipos de Documento',
            'url' => 'tipo-documentos',
            'icon' => 'fas fa-fw fa-id-card',
        ],

        ['header' => 'FORMAS DE PAGO Y CLIENTES'],
        [
            'text' => 'Formas de Pago',
            'url' => 'forma-de-pagos',
            'icon' => 'fas fa-fw fa-money-bill-wave',
        ],
        [
            'text' => 'Clientes',
            'url' => 'clientes',
            'icon' => 'fas fa-fw fa-users',
        ],

        ['header' => 'FACTURAS Y DETALLES'],
        [
            'text' => 'Facturas',
            'url' => 'facturas',
            'icon' => 'fas fa-fw fa-file-invoice-dollar',
        ],
        [
            'text' => 'Detalle Facturas',
            'url' => 'detalle-facturas',
            'icon' => 'fas fa-fw fa-list',
        ],

        ['header' => 'ARTÍCULOS Y TIPOS'],
        [
            'text' => 'Tipo Artículos',
            'url' => 'tipo-articulos',
            'icon' => 'fas fa-fw fa-tags',
        ],
        [
            'text' => 'Artículos',
            'url' => 'articulos',
            'icon' => 'fas fa-fw fa-box-open',
        ],

        ['header' => 'DEVOLUCIONES'],
        [
            'text' => 'Devoluciones',
            'url' => 'devolucions',
            'icon' => 'fas fa-fw fa-undo-alt',
        ],
    ],

    'plugins' => [],

];

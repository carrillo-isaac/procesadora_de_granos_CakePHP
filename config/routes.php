<?php

/**
 * Routes configuration.
 * ... (Copyright and license comments) ...
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * This file is loaded in the context of the `Application` class.
 * So you can use `$this` to reference the application class instance
 * if required.
 */

return function (RouteBuilder $routes): void {

    $routes->setRouteClass(DashedRoute::class);

    // =========================================================================
    //  RUTAS PERSONALIZADAS AÑADIDAS AQUÍ (FUERA DEL SCOPE PRINCIPAL)
    // =========================================================================

    // 1. Ruta canónica de LOGIN: Redirige /login al PagesController
    $routes->connect('/login', ['controller' => 'Pages', 'action' => 'login']);

    // 2. Ruta antigua de LOGIN: Redirige /usuarios/login al PagesController
    // Esto previene el error 'MissingActionException' en UsuariosController
    $routes->connect('/login', ['controller' => 'Pages', 'action' => 'login']);

    // 3. Ruta de LOGOUT: Redirige /logout al PagesController
    $routes->connect('/logout', ['controller' => 'Pages', 'action' => 'logout']);

    // 4. Ruta de REGISTER: (Asumiendo que Register se quedó en UsuariosController)
    $routes->connect('/register', ['controller' => 'Usuarios', 'action' => 'register']);

    // =========================================================================
    //  FIN DE RUTAS PERSONALIZADAS
    // =========================================================================


    $routes->scope('/', function (RouteBuilder $builder): void {

        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        $builder->connect('/pages/*', 'Pages::display');

        $builder->fallbacks();
    });

    $routes->prefix('Api', function (RouteBuilder $builder) {

    $builder->setExtensions(['json']);

    // Rutas personalizadas
    $builder->connect('/productos/destacados', [
        'controller' => 'Productos',
        'action' => 'destacados'
    ]);
    $builder->connect('/productos/destacados/:id', [
        'controller' => 'Productos',
        'action' => 'destacadosId'
    ])
    ->setPass(['id'])
    ->setPatterns(['id' => '\d+']);

    $builder->connect('/productos/mostrar', [
        'controller' => 'Productos',
        'action' => 'mostrar'
    ]);

    $builder->connect('/productos/categoria/:id', [
        'controller' => 'Productos',
        'action' => 'categoria'
    ])
    ->setPass(['id'])
    ->setPatterns(['id' => '\d+']);

    // Rutas REST automáticas
    $builder->resources('Productos');
});


};




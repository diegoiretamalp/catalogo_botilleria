<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MainController::index');

################### RUTAS LOGIN ###################
$routes->get('login', 'LoginController::index');
$routes->post('login', 'LoginController::index');
################### RUTAS PRODUCTOS ###################
$routes->get('productos', 'ProductosController::index');
$routes->get('productos/nuevo', 'ProductosController::NuevoProducto');
$routes->post('productos/nuevo', 'ProductosController::NuevoProducto');

################### RUTAS PRODUCTOS-CATEGORIAS ###################
$routes->get('productos/(:any)/', 'ProductosController::ProductosCategoria/$1');


################### RUTAS CATEGORIAS ###################
$routes->get('categorias', 'CategoriasController::index');
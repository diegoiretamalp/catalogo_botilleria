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
$routes->post('productos/paginar-feed', 'ProductosController::PaginarFeed');
$routes->post('productos/paginar-procate/(:any)', 'ProductosController::PaginarProCate/$1');

################### RUTAS PRODUCTOS-CATEGORIAS ###################
$routes->get('productos/(:any)/', 'ProductosController::ProductosCategoria/$1');


################### RUTAS CATEGORIAS ###################
$routes->get('categorias', 'CategoriasController::index');

################### RUTAS-ADMINISTRACION-PRODUCTOS ###################
$routes->get('admin/productos/listado', 'Admin\AdminProductosController::index');
$routes->get('admin/productos/nuevo', 'Admin\AdminProductosController::NuevoProducto');
$routes->post('admin/productos/nuevo', 'Admin\AdminProductosController::NuevoProducto');
$routes->get('admin/productos/editar/(:num)', 'Admin\AdminProductosController::EditarProducto/$1');
$routes->post('admin/productos/editar/(:num)', 'Admin\AdminProductosController::EditarProducto/$1');
$routes->post('admin/productos/eliminar', 'Admin\AdminProductosController::EliminarProducto');

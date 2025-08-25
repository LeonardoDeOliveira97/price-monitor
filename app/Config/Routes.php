<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->get('/home', 'HomeController::index');

// Users
$routes->get('/usuarios', 'UsersController::index');
$routes->get('/usuarios/novo', 'UsersController::create');

// Products
$routes->get('/produtos', 'ProductsController::index');
$routes->get('/produtos/novo', 'ProductsController::create');
$routes->get('/produtos/monitorar', 'ProductsController::monitoring');
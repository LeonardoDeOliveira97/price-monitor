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
// Users - API (JSON)
$routes->get('/usuarios/listar', 'UsersController::findAll');
$routes->post('/usuarios/novo', 'UsersController::store');
$routes->patch('/usuarios/editar', 'UsersController::update');
$routes->delete('/usuarios/excluir/(:any)', 'UsersController::delete/$1');

// Products
$routes->get('/produtos', 'ProductsController::index');
$routes->get('/produtos/novo', 'ProductsController::create');
$routes->get('/produtos/monitorar', 'ProductsController::monitoring');

// Integrations
$routes->get('/integracoes', 'IntegrationController::index');
$routes->get('/integracoes/nova', 'IntegrationController::create');
// Integrations - API (JSON)
$routes->post('/integracoes/nova', 'IntegrationController::store');

$routes->get('/integracoes/listar', 'IntegrationController::findAll');
$routes->get('/integracoes/nova/(:any)', 'IntegrationController::addNewIntegration/$1');
$routes->get('/integracoes/callback', 'IntegrationController::callback');
$routes->patch('/integracoes/editar', 'IntegrationController::update');
$routes->delete('/integracoes/excluir/(:any)', 'IntegrationController::delete/$1');

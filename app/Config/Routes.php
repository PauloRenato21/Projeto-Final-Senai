<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');

$routes->resource('responsavel');
$routes->resource('cargo');
$routes->resource('categoria');
$routes->resource('funcionario');
$routes->resource('admin',['placeholder' => '(:num)']);
$routes->resource('atleta',['placeholder' => '(:num)']);
$routes->get('atleta/informacoes','atleta::atletaTurmaResponsavel');
$routes->get('atleta/pdf','atleta::atletaPdf');
$routes->resource('franquia',['placeholder' => '(:num)']);
$routes->get('franquia/informacoes','franquia::franquiaClube');
$routes->get('franquia/pdf','franquia::franquiaPdf');
$routes->resource('clube',['placeholder' => '(:num)']);
$routes->resource('turma',['placeholder' => '(:num)']);
$routes->get('turma/informacoes','turma::turmaCategoriaFranquia');
$routes->get('clube/franquia','clube::clubeFranquia');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

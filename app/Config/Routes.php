<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index', ['filter' => 'auth']);

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

$routes->group('produk', ['filter' => 'auth'], function ($routes) { 
    $routes->get('', 'ProdukController::index');
    $routes->post('', 'ProdukController::create');
    $routes->post('edit/(:any)', 'ProdukController::edit/$1');
    $routes->get('delete/(:any)', 'ProdukController::delete/$1');
});
$routes->get('keranjang', 'TransaksiController::index', ['filter' => 'auth']);
$routes->get('stokBarang', 'Home::stokBarang', ['filter' => 'auth']);
$routes->get('pelanggan', 'PelangganController::index', ['filter' => 'auth']);
$routes->get('riwayatPembelian', 'Home::riwayatPembelian', ['filter' => 'auth']);
$routes->get('dashboard', 'DashboardController::index', ['filter' => 'auth']);


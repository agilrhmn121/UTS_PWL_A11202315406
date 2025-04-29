<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index', ['filter' => 'auth']);

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

$routes->get('produk', 'ProdukController::index', ['filter' => 'auth']);
$routes->get('keranjang', 'TransaksiController::index', ['filter' => 'auth']);
$routes->get('stokBarang', 'Home::stokBarang', ['filter' => 'auth']);
$routes->get('pelanggan', 'PelangganController::index', ['filter' => 'auth']);
$routes->get('riwayatPembelian', 'Home::riwayatPembelian', ['filter' => 'auth']);

$routes->get('dashboard', 'DashboardController::index', ['filter' => 'auth']);

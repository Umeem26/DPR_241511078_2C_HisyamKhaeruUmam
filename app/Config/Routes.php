<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'AuthController::index');
$routes->post('auth/process', 'AuthController::process');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);
$routes->get('/anggota', 'AnggotaController::index', ['filter' => 'auth']);

$routes->get('/anggota/tambah', 'AnggotaController::tambah', ['filter' => 'auth']);
$routes->post('/anggota/simpan', 'AnggotaController::simpan', ['filter' => 'auth']);

$routes->get('/anggota/edit/(:num)', 'AnggotaController::edit/$1', ['filter' => 'auth']);
$routes->post('/anggota/update/(:num)', 'AnggotaController::update/$1', ['filter' => 'auth']);

$routes->get('/anggota/hapus/(:num)', 'AnggotaController::hapus/$1', ['filter' => 'auth']);

$routes->get('/komponen-gaji', 'KomponenGajiController::index', ['filter' => 'auth']);
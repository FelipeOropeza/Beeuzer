<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LojaController::index'); // Página inicial
// $routes->get('produto/(:num)', 'LojaController::detalhes/$1'); // Ver detalhes do produto
// $routes->get('cadastro', 'UsuarioController::cadastro'); // Página de cadastro
// $routes->post('cadastro', 'UsuarioController::registrar'); // Processar cadastro
// $routes->get('login', 'UsuarioController::login'); // Página de login
// $routes->post('login', 'UsuarioController::autenticar'); // Processar login
// $routes->get('logout', 'UsuarioController::logout'); // Logout

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LojaController::index', ['as' => 'home']); // Página inicial
$routes->get('produto/(:num)', 'LojaController::detalhes/$1', ['as' => 'detalhes']); // Ver detalhes do produto
$routes->get('cadastro', 'UsuarioController::cadastro', ['as' => 'cadastro']); // Página de cadastro
$routes->post('cadastro', 'UsuarioController::registrar', ['as' => 'registrar']); // Processar cadastro
$routes->get('login', 'UsuarioController::login', ['as' => 'login']); // Página de login
$routes->post('login', 'UsuarioController::autenticar', ['as' => 'autenticar']); // Processar login
$routes->get('logout', 'UsuarioController::logout', ['as' => 'logout']); // Logout

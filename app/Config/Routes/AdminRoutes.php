<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('admin', function ($routes) {
    $routes->get('login', 'AdminController::login'); // Página de login
    $routes->post('login', 'AdminController::autenticar', ['as' => 'auth']); // Processar login
});

// $routes->group('admin', ['filter' => 'admin'], function ($routes) {
//     $routes->get('dashboard', 'AdminController::index'); // Painel admin
//     $routes->get('produtos', 'AdminController::produtos'); // Gerenciar produtos
//     $routes->post('produtos/adicionar', 'AdminController::adicionarProduto'); // Adicionar produto
// });

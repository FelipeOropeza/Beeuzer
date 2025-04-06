<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('admin', function ($routes) {
    $routes->get('login', 'AdminController::login');
    $routes->post('login', 'AdminController::autenticar', ['as' => 'auth']);
});

$routes->group('admin', ['filter' => 'admin'], function ($routes) {
    $routes->get('dashboard', 'AdminController::index', ['as' => 'dashboard']);
    $routes->get('logout', 'AdminController::logout'); // Logout
    $routes->get('produtos', 'AdminController::produtos', ['as' => 'produtos']);
    $routes->post('produtos/adicionar', 'AdminController::adicionarProduto', ['as' => 'adicionar_produto']);
    $routes->post('produtos/desativar/(:num)', 'AdminController::desativarProduto/$1', ['as' => 'desativar_produto']);
    $routes->post('produtos/atualizar', 'AdminController::atualizarProduto', ['as' => 'atualizar_produto']);
    $routes->post('produtos/adicionar_variacao', 'AdminController::adicionarVariacao', ['as' => 'adicionar_variacao']);
});

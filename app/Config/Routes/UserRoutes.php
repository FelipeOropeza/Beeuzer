<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('usuario', ['filter' => 'auth'], function ($routes) {
    $routes->get('carrinho', 'CarrinhoController::index', ['as' => 'carrinho']); // Página do carrinho
    $routes->get('carrinho/verCarrinho', 'CarrinhoController::verCarrinho', ['as' => 'verCarrinho']); // Ver carrinho
    $routes->get('carrinho/adicionar/(:num)', 'CarrinhoController::adicionar/$1', ['as' => 'adicionar']); // Adicionar ao carrinho
    $routes->get('carrinho/remover/(:num)', 'CarrinhoController::remover/$1', ['as' => 'remover']); // Remover do carrinho
    $routes->post('comprar', 'CarrinhoController::finalizarCompra'); // Finalizar compra
});

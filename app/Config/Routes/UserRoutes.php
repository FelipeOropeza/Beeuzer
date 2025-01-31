<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('usuario', ['filter' => 'auth'], function ($routes) {
    $routes->get('carrinho', 'CarrinhoController::index'); // Página do carrinho
    $routes->post('carrinho/adicionar', 'CarrinhoController::adicionar'); // Adicionar ao carrinho
    $routes->post('carrinho/remover', 'CarrinhoController::remover'); // Remover do carrinho
    $routes->post('comprar', 'CarrinhoController::finalizarCompra'); // Finalizar compra
});

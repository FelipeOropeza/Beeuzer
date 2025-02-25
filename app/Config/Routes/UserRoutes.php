<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('usuario', ['filter' => 'auth'], function ($routes) {
    $routes->get('carrinho', 'CarrinhoController::index', ['as' => 'carrinho']); // Página do carrinho
    $routes->get('carrinho/meucarrinho', 'CarrinhoController::meucarrinho', ['as' => 'meucarrinho']); // Ver carrinho
    $routes->post('carrinho/adicionar', 'CarrinhoController::adicionar', ['as' => 'adicionar']); // Adicionar ao carrinho
    $routes->get('carrinho/remover/(:num)', 'CarrinhoController::remover/$1', ['as' => 'remover']); // Remover do carrinho
    $routes->get('finalizar', 'CarrinhoController::finalizarCompra', ['as' => 'finalizar']); // Finalizar compra
    $routes->get('finalizar/completarinfo/(:num)', 'CarrinhoController::completarInfo/$1', ['as' => 'completarinfo_pedido']); // Informações do pedido
    $routes->get('perfil', 'PerfilController::index', ['as' => 'perfil']); // Perfil
    $routes->get('perfil/meus_pedidos', 'PerfilController::meusPedidos', ['as' => 'meus_pedidos']); // Meus pedidos
    $routes->get('perfil/meus_cartoes', 'PerfilController::meusCartoes', ['as' => 'meus_cartoes']); // Meus cartões
    $routes->post('perfil/cartoes/cadastrar', 'PerfilController::cadastrarCartao', ['as' => 'cadastrar_cartao']); // Cadastrar cartão
    $routes->post('perfil/cartoes/excluir/(:num)', 'PerfilController::excluirCartao/$1', ['as' => 'excluir_cartao']); // Excluir cartão
});

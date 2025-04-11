<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('carrinho', 'CarrinhoController::index', ['as' => 'carrinho']); // Página do carrinho
    $routes->get('carrinho/meucarrinho', 'CarrinhoController::meucarrinho', ['as' => 'meucarrinho']); // Ver carrinho
    $routes->post('carrinho/adicionar', 'CarrinhoController::adicionar', ['as' => 'adicionar']); // Adicionar ao carrinho
    $routes->post('carrinho/remover/(:num)', 'CarrinhoController::remover/$1', ['as' => 'remover']); // Remover do carrinho
    $routes->get('carrinho/finalizar', 'CarrinhoController::finalizarCompra', ['as' => 'finalizar']); // Finalizar carrinho
    $routes->get('finalizar/endereco/(:num)', 'CarrinhoController::completarEndereco/$1', ['as' => 'endereco']); // Informações do pedido
    $routes->post('finalizar/endereco/(:num)', 'CarrinhoController::finalizarEndereco/$1', ['as' => 'finalizar_endereco']); // Finalizar endereço
    $routes->get('finalizar/pagamento/(:num)', 'CarrinhoController::completarPagamento/$1', ['as' => 'pagamento']); // Finalizar pagamento
    $routes->post('finalizar/pagamento/(:num)', 'CarrinhoController::finalizarPagamento/$1', ['as' => 'finalizar_pagamento']); // Finalizar pagamento
    $routes->get('perfil', 'PerfilController::index', ['as' => 'perfil']); // Perfil
    $routes->get('perfil/meus_pedidos', 'PerfilController::meusPedidos', ['as' => 'meus_pedidos']); // Meus pedidos
    $routes->get('perfil/meus_cartoes', 'PerfilController::meusCartoes', ['as' => 'meus_cartoes']); // Meus cartões
    $routes->post('perfil/cartoes/cadastrar', 'PerfilController::cadastrarCartao', ['as' => 'cadastrar_cartao']); // Cadastrar cartão
    $routes->post('perfil/cartoes/excluir/(:num)', 'PerfilController::excluirCartao/$1', ['as' => 'excluir_cartao']); // Excluir cartão
    $routes->post('perfil/excluir', 'PerfilController::excluirConta', ['as' => 'excluir_conta']);  // Excluir conta do usuario
    $routes->get('buscar-cep/(:num)', 'EnderecoController::buscarCep/$1'); // Buscar CEP
});

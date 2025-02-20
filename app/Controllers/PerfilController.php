<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CartaoModel;
use App\Models\PedidoModel;

class PerfilController extends Controller
{
    public function index()
    {
        return view('loja/perfil');
    }

    public function meusPedidos()
    {
        $usuarioId = session()->get('usuario')['id'];

        $pedidoModel = new PedidoModel();

        $pedidos = $pedidoModel->getPedidos($usuarioId);

        foreach ($pedidos as &$pedido) {
            if (is_null($pedido['pagamento'])) {
                $pedido['status_pagamento'] = 'Pagamento ainda não foi feito';
            } else {
                $pedido['status_pagamento'] = 'Pagamento realizado';
            }
        }
        
        return view('loja/meus-pedidos', ['pedidos' => $pedidos]);
    }

    public function meusCartoes()
    {
        $cartaoModel = new CartaoModel();

        $cartoes = $cartaoModel->where('user_id', session()->get('usuario')['id'])->findAll();

        return view('loja/meus-cartoes', ['cartoes' => $cartoes]);
    }
}
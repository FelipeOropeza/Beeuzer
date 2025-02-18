<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CartaoModel;

class PerfilController extends Controller
{
    public function index()
    {
        return view('loja/perfil');
    }

    public function meusPedidos()
    {
        return view('loja/meus-pedidos');
    }

    public function meusCartoes()
    {
        $cartaoModel = new CartaoModel();

        $cartoes = $cartaoModel->where('user_id', session()->get('usuario')['id'])->findAll();

        return view('loja/meus-cartoes', ['cartoes' => $cartoes]);
    }
}
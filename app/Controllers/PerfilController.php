<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class PerfilController extends Controller
{
    public function index()
    {
        return view('loja/perfil');
    }

    public function meusPedidos()
    {
        echo 'Meus pedidos';
    }
}
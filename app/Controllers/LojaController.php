<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProdutoModel;

class LojaController extends Controller
{
    public function index()
    {
        $produtoModel = new ProdutoModel();

        $produtos = $produtoModel->findAll();

        foreach ($produtos as &$produto) {
            if (!empty($produto['imagem'])) {
                $produto['imagem'] = base_url($produto['imagem']);
            }
        }

        return view('loja/loja', ['produtos' => $produtos]);
    }
}
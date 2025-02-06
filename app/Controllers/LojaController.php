<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProdutoModel;
use App\Models\CorModel;
use App\Models\TamanhoModel;

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

    public function detalhes($id)
    {
        $produtoModel = new ProdutoModel();
        $corModel = new CorModel();
        $tamanhoModel = new TamanhoModel();

        $produto = $produtoModel->find($id);

        if (empty($produto)) {
            return redirect()->to('/');
        }

        if (!empty($produto['imagem'])) {
            $produto['imagem'] = base_url($produto['imagem']);
        }

        $data = [
            'produto' => $produto,
            'cores' => $corModel->findAll(),
            'tamanhos' => $tamanhoModel->findAll(),
        ];

        return view('loja/detalhes', $data);
    }
}
<?php
namespace App\Controllers;

use App\Models\ProdutoModel;
use App\Models\CarrinhoModel;

class CarrinhoController extends BaseController
{
    public function index()
    {
        $produtoModel = new ProdutoModel();
        $data['produtos'] = $produtoModel->findAll();
        return view('loja/lista_produtos', $data);
    }

    public function adicionar($produto_id)
    {
        $session = session();
        $carrinhoModel = new CarrinhoModel();

        // Verifica se o usuário está logado
        if (!$session->has('usuario')) {
            return redirect()->to('/login');
        }

        $user_id = $session->get('usuario')['id'];

        // Verifica se o produto já está no carrinho do usuário
        $item = $carrinhoModel->where('produto_id', $produto_id)
            ->where('user_id', $user_id)
            ->first();

        if ($item) {
            // Atualiza a quantidade
            $carrinhoModel->update($item['id'], ['quantidade' => $item['quantidade'] + 1]);
        } else {
            // Adiciona novo item ao carrinho
            $carrinhoModel->insert([
                'produto_id' => $produto_id,
                'quantidade' => 1,
                'user_id' => $user_id
            ]);
        }

        return redirect()->to('usuario/carrinho/verCarrinho');
    }

    public function verCarrinho()
    {
        $session = session();
        $carrinhoModel = new CarrinhoModel();
        $produtoModel = new ProdutoModel();

        // Verifica se o usuário está logado
        if (!$session->has('usuario')) {
            return redirect()->to('/login'); // Redireciona para a página de login
        }

        $user_id = $session->get('usuario')['id'];

        // Busca os itens do carrinho do usuário
        $itens = $carrinhoModel->where('user_id', $user_id)->findAll();
        $data['itens'] = [];

        foreach ($itens as $item) {
            $produto = $produtoModel->find($item['produto_id']);
            $data['itens'][] = [
                'produto' => $produto,
                'quantidade' => $item['quantidade'],
                'id_carrinho' => $item['id'] // ID do item no carrinho para remoção
            ];
        }

        return view('loja/carrinho', $data);
    }

    public function remover($id)
    {
        $carrinhoModel = new CarrinhoModel();
        $carrinhoModel->delete($id);
        return redirect()->to('loja/carrinho');
    }
}
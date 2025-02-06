<?php
namespace App\Controllers;

use App\Models\ProdutoModel;
use App\Models\CarrinhoModel;
use App\Models\ProdutoVariacaoModel;

class CarrinhoController extends BaseController
{
    public function adicionar()
    {
        $session = session();
        $carrinhoModel = new CarrinhoModel();

        if (!$session->has('usuario')) {
            return redirect()->to('/login');
        }

        $produtoVariacao = new ProdutoVariacaoModel();
        $dadosformulario = $this->request->getPost();

        $user_id = $session->get('usuario')['id'];

        $result = $produtoVariacao->getVariacaoProduto($dadosformulario['produto_id'], $dadosformulario['cor_id'], $dadosformulario['tamanho_id']);

        if (!$result) {
            return redirect()->to('produto/' . $dadosformulario['produto_id'])
                ->withInput()
                ->with('erro', 'A combinação selecionada de tamanho e cor não está disponível para este produto.');
        }

        $item = $carrinhoModel->where('produtos_variacoes_id', $result['id'])
            ->where('user_id', $user_id)
            ->first();

        if ($item) {
            $carrinhoModel->update($item['id'], ['quantidade' => $item['quantidade'] + $dadosformulario['quantidade']]);
        } else {
            var_dump($result);
            $carrinhoModel->insert([
                'produtos_variacoes_id' => $result['id'],
                'quantidade' => $dadosformulario['quantidade'],
                'user_id' => $user_id
            ]);
        }

        return redirect()->to('usuario/carrinho/meucarrinho');
    }

    public function meucarrinho()
    {
        // $session = session();
        // $carrinhoModel = new CarrinhoModel();
        // $produtoModel = new ProdutoModel();

        // // Verifica se o usuário está logado
        // if (!$session->has('usuario')) {
        //     return redirect()->to('/login'); // Redireciona para a página de login
        // }

        // $user_id = $session->get('usuario')['id'];

        // // Busca os itens do carrinho do usuário
        // $itens = $carrinhoModel->where('user_id', $user_id)->findAll();
        // $data['itens'] = [];

        // foreach ($itens as $item) {
        //     $produto = $produtoModel->find($item['produto_id']);
        //     $data['itens'][] = [
        //         'produto' => $produto,
        //         'quantidade' => $item['quantidade'],
        //         'id_carrinho' => $item['id'] // ID do item no carrinho para remoção
        //     ];
        // }

        return view('loja/carrinho');
    }

    public function remover($id)
    {
        $carrinhoModel = new CarrinhoModel();
        $carrinhoModel->delete($id);
        return redirect()->to('loja/carrinho');
    }
}
<?php
namespace App\Controllers;

use App\Models\CarrinhoModel;
use App\Models\ProdutoVariacaoModel;
use App\Models\PedidoModel;
use App\Models\PedidoProdutoModel;
use App\Models\EnderecoPagamentoModel;
use App\Models\CartaoModel;
use App\Models\EnderecoModel;
use App\Models\PagamentoModel;
use CodeIgniter\Config\Services;


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

        return redirect()->to('carrinho/meucarrinho');
    }

    public function meucarrinho()
    {
        $session = session();

        if (!$session->has('usuario')) {
            return redirect()->to('/login');
        }

        $user_id = $session->get('usuario')['id'];

        $carrinhoModel = new CarrinhoModel();
        $data['itens'] = $carrinhoModel->getCarrinhoDetalhado($user_id);

        return view('loja/carrinho', $data);
    }


    public function remover($id)
    {
        $carrinhoModel = new CarrinhoModel();
        $carrinhoModel->delete($id);
        return redirect()->to('loja/carrinho');
    }

    public function finalizarCompra()
    {
        $session = session();

        if (!$session->has('usuario')) {
            return redirect()->to('/login');
        }

        $user_id = $session->get('usuario')['id'];

        $carrinhoModel = new CarrinhoModel();
        $carrinho = $carrinhoModel->getCarrinhoDetalhado($user_id);

        if (empty($carrinho)) {
            return redirect()->to('carrinho/meucarrinho')
                ->with('erro', 'Seu carrinho está vazio.');
        }

        $total = 0;
        foreach ($carrinho as $item) {
            $total += $item['preco'] * $item['quantidade'];
        }

        $pedidoModel = new PedidoModel();
        $pedido_id = $pedidoModel->insert([
            'user_id' => $user_id,
            'datapedido' => date('Y-m-d'),
            'totalpedido' => $total
        ]);

        $pedidoProdutoModel = new PedidoProdutoModel();
        foreach ($carrinho as $item) {
            $pedidoProdutoModel->insert([
                'pedido_id' => $pedido_id,
                'produtos_variacoes_id' => $item['produtos_variacoes_id'],
                'quantidade' => $item['quantidade'],
                'valoritem' => $item['preco'],
                'totalprod' => $item['quantidade'] * $item['preco']
            ]);
        }

        $carrinhoModel->where('user_id', $user_id)->delete();

        return redirect()->to('finalizar/endereco/' . $pedido_id);
    }

    public function completarEndereco($id)
    {
        return view('loja/endereco', ['pedido_id' => $id]);
    }

    public function finalizarEndereco($id)
    {
        $validation = Services::validation();

        $dadosformulario = $this->request->getPost();

        if (isset($dadosformulario['cep'])) {
            $dadosformulario['cep'] = str_replace('-', '', $dadosformulario['cep']);
        }

        $enderecoModel = new EnderecoModel();

        $rules = [
            'bairro' => 'required',
            'numero' => 'required|max_length[4]',
            'complemento' => 'max_length[10]'
        ];

        $messages = [
            'bairro' => [
                'required' => 'O campo Bairro é obrigatório.',
            ],
            'numero' => [
                'required' => 'O campo Numero é obrigatório.',
                'max_length' => 'O Numero não pode ter mais de 4 caracteres.'
            ],
            'complemento' => [
                'max_length' => 'O Complemento não pode ter mais de 100 caracteres.'
            ]
        ];

        if (!$validation->setRules($rules, $messages)->run($dadosformulario)) {
            $validationErrors = $validation->getErrors();
        } else {
            $validationErrors = [];
        }

        if (!$enderecoModel->validate($dadosformulario)) {
            $modelErrors = $enderecoModel->errors();
        } else {
            $modelErrors = [];
        }

        $allErrors = array_merge($validationErrors, $modelErrors);

        if (!empty($allErrors)) {
            return redirect()->back()->withInput()->with('validation', $allErrors);
        }

        if ($enderecoModel->where('cep', $dadosformulario['cep'])->first() == null) {
            $enderecoModel->insert([
                'cep' => $dadosformulario['cep'],
                'rua' => $dadosformulario['rua'],
                'cidade' => $dadosformulario['cidade'],
                'estado' => $dadosformulario['estado']
            ]);
        }

        $enderecoData = [
            'cep' => $dadosformulario['cep'],
            'numero' => $dadosformulario['numero'],
            'complemento' => $dadosformulario['complemento'],
            'rua' => $dadosformulario['rua'],
            'bairro' => $dadosformulario['bairro'],
            'cidade' => $dadosformulario['cidade'],
            'estado' => $dadosformulario['estado']
        ];

        session()->set('endereco', $enderecoData);
        return redirect()->to('finalizar/pagamento/' . $id);
    }

    public function completarPagamento($id)
    {
        $session = session();
        $user_id = $session->get('usuario')['id'];

        $cartaoModel = new CartaoModel();
        $data['cartoes'] = $cartaoModel->where('user_id', $user_id)->findAll();
        $data['pedido_id'] = $id;

        return view('loja/pagamento', $data, );
    }

    public function finalizarPagamento($id)
    {
        $user_id = session()->get('usuario')['id'];
        $enderecoData = session()->get('endereco');

        $cartaoModel = new CartaoModel();
        $pagamentoModel = new PagamentoModel();
        $enderecoPagamentoModel = new EnderecoPagamentoModel();
        $enderecoModel = new EnderecoModel();
        $dadosformulario = $this->request->getPost();

        if (!$cartaoModel->validate($dadosformulario)) {
            return redirect()->back()->withInput()->with('validation', $cartaoModel->errors());
        }

        if ($dadosformulario['cartaoSelecionado'] == '') {
            $cartao_id = $cartaoModel->insert([
                'user_id' => $user_id,
                'numero_cartao' => $dadosformulario['numero_cartao'],
                'nome_titular' => $dadosformulario['nome_titular'],
                'validade' => $dadosformulario['validade'],
                'cvv' => $dadosformulario['cvv'],
                'tipo_cartao' => $dadosformulario['tipo_cartao'],
            ]);
        } else {
            $cartao_id = $dadosformulario['cartaoSelecionado'];
        }

        $pagamento_id = $pagamentoModel->insert([
            'pedido_id' => $id,
            'metodo_pagamento' => "Cartao",
            'datapagamento' => date('Y-m-d'),
            'cartao_id' => $cartao_id,
        ]);

        $endereco_id = $enderecoModel->where('cep', $enderecoData['cep'])->first()['id'];

        $enderecoPagamentoModel->insert([
            'endereco_id' => $endereco_id,
            'pagamento_id' => $pagamento_id,
            'numeroEndereco' => $enderecoData['numero'],
            'complemento' => $enderecoData['complemento']
        ]);

        session()->remove('endereco');

        return redirect()->to('finalizar/sucesso/' . $id)
            ->with('sucesso', 'Pagamento realizado com sucesso!');
    }

    public function sucesso($id)
    {
        $pedidoModel = new PedidoModel();
        $pedido = $pedidoModel->find($id);

        $sucesso = session()->getFlashdata('sucesso');

        return view('loja/confirmacao', ['pedido' => $pedido, 'sucesso' => $sucesso]);
    }

}
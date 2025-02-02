<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\ProdutoModel;
use App\Models\CorModel;
use App\Models\TamanhoModel;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin/login');
    }

    public function autenticar()
    {
        $usuarioModel = new UsuarioModel();

        $dadosFormulario = $this->request->getPost();

        if (!$usuarioModel->validate($dadosFormulario)) {
            return view('admin/login', [
                'validation' => $usuarioModel->errors(),
            ]);
        }

        $email = $dadosFormulario['email'];
        $password = $dadosFormulario['senha'];

        unset($dadosFormulario['email'], $dadosFormulario['senha']);

        $usuario = $usuarioModel->where('email', $email)->first();

        if ($usuario && password_verify($password, $usuario['senha'])) {
            if (!session()->has('is_admin')) {
                session()->start();
            }

            session()->set([
                'is_admin' => true,
                'user_id' => $usuario['id'],
                'username' => $usuario['nome'],
                'logged_in' => true
            ]);

            return redirect()->to('/admin/dashboard');
        } else {
            session()->setFlashdata('erro', 'E-mail ou senha incorretos.');
            return redirect()->to('/admin/login');
        }
    }

    public function index()
{
    if (!session()->get('is_admin')) {
        return redirect()->to('admin/login')->with('error', 'Acesso negado.');
    }

    $produtoModel = new ProdutoModel();
    $produtosCount = $produtoModel->countAll();

    return view('admin/dashboard', [
        'produtosCount' => $produtosCount
    ]);
}


    public function logout()
    {
        session()->destroy();
        return redirect()->to('admin/login')->with('success', 'Logout realizado com sucesso.');
    }

    public function produtos()
    {
        if (!session()->get('is_admin')) {
            return redirect()->to('admin/login')->with('error', 'Acesso negado.');
        }

        $produtoModel = new ProdutoModel();
        $corModel = new CorModel();
        $tamanhoModel = new TamanhoModel();

        $produtos = $produtoModel
            ->select('produtos.id, produtos.nome, produtos.preco, cores.nome AS cor, tamanhos.descricao AS tamanho')
            ->join('cores', 'cores.id = produtos.cor_id')
            ->join('tamanhos', 'tamanhos.id = produtos.tamanho_id')
            ->findAll();

        $data = [
            'produtos' => $produtos,
            'cores' => $corModel->findAll(),
            'tamanhos' => $tamanhoModel->findAll(),
        ];

        return view('admin/produto', $data);

    }

    public function adicionarProduto()
    {
        if (!session()->get('is_admin')) {
            return redirect()->to('admin/login')->with('error', 'Acesso negado.');
        }

        $produtoModel = new ProdutoModel();

        $dadosFormulario = $this->request->getPost();

        if (!$produtoModel->validate($dadosFormulario)) {
            return redirect()->to('admin/produtos')
                ->withInput()
                ->with('validation', $produtoModel->errors());
        }

        $produtoModel->save($dadosFormulario);

        return redirect()->to('admin/produtos')->with('success', 'Produto adicionado com sucesso.');
    }
}

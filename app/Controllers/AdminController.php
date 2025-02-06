<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\ProdutoModel;
use App\Models\CorModel;
use App\Models\TamanhoModel;
use App\Models\ProdutoVariacaoModel;

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
        $produtoVariacaoModel = new ProdutoVariacaoModel();

        $produtosVariacoes = $produtoVariacaoModel->getVariaçõesProduto();

        $data = [
            'produtosVariacoes' => $produtosVariacoes,
            'produtos' => $produtoModel->findAll(),
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

        $file = $this->request->getFile('image');

        $imagePath = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();

            $publicPath = FCPATH . 'uploads/';

            $file->move($publicPath, $newName);

            $imagePath = 'uploads/' . $newName;
        }

        $dadosFormulario = $this->request->getPost();

        $dadosFormulario['imagem'] = $imagePath;

        if (!$produtoModel->validate($dadosFormulario)) {
            return redirect()->to('admin/produtos')
                ->withInput()
                ->with('validation', $produtoModel->errors());
        }

        $produtoModel->save($dadosFormulario);

        return redirect()->to('admin/produtos')->with('success', 'Produto adicionado com sucesso.');
    }

    public function adicionarVariacao()
    {
        if (!session()->get('is_admin')) {
            return redirect()->to('admin/login')->with('error', 'Acesso negado.');
        }

        $produtovariacaoModel = new ProdutoVariacaoModel();

        $dadosFormulario = $this->request->getPost();

        $cor_id = $dadosFormulario['cor_id'];
        $tamanho_id = $dadosFormulario['tamanho_id'];

        $variacaoExistente = $produtovariacaoModel->where('cor_id', $cor_id)
            ->where('tamanho_id', $tamanho_id)
            ->first();

        if ($variacaoExistente) {
            return redirect()->to('admin/produtos')->with('error', 'Esta variação de produto já existe com a mesma cor e tamanho.');
        }

        $produtovariacaoModel->save($dadosFormulario);

        return redirect()->to('admin/produtos')->with('success', 'Variação adicionada com sucesso.');
    }

}

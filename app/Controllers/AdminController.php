<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;

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

        return view('admin/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('admin/login')->with('success', 'Logout realizado com sucesso.');
    }
}

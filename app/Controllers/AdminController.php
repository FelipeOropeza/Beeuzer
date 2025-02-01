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
            echo 'Usuário autenticado com sucesso!';
        } else {
            session()->setFlashdata('erro', 'E-mail ou senha incorretos.');
            return redirect()->to('/admin/login');
        }
    }
}

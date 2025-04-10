<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;

class UsuarioController extends Controller
{
    public function login()
    {
        return view('loja/login');
    }

    public function logout()
    {
        session()->remove('usuario');
        return redirect()->to('/');
    }

    public function autenticar()
    {
        $usuarioModel = new UsuarioModel();
        $dadosFormulario = $this->request->getPost();

        if (!$usuarioModel->validate($dadosFormulario)) {
            return redirect()->back()->withInput()->with('validation', $usuarioModel->errors());
        }

        $emailExistente = $usuarioModel->where('email', $dadosFormulario['email'])->first();
        if (!$emailExistente || $emailExistente['status'] != 'Ativo') {
            return redirect()->back()->withInput()->with('validation', [
                'email' => 'O e-mail informado não está registrado.'
            ]);
        }

        if ($emailExistente['email_verificado'] == 0) {
            return redirect()->back()->withInput()->with('validation', [
                'email' => 'O e-mail informado não está verificado.'
            ]);
        }

        if ($emailExistente['email_verificado'] == 0) {
            return redirect()->back()->withInput()->with('validation', [
                'email' => 'O e-mail informado não está verificado.'
            ]);
        }

        $usuario = $usuarioModel->where('email', $dadosFormulario['email'])->first();

        if (!$usuario || !password_verify($dadosFormulario['senha'], $usuario['senha'])) {
            return redirect()->back()->withInput()->with('validation', ['senha' => 'E-mail ou senha inválidos.']);
            ;
        }

        unset($usuario['senha'], $usuario['created_at'], $usuario['updated_at']);

        session()->set('usuario', $usuario);

        return redirect()->to('/');
    }

    public function cadastro()
    {
        unset($data);
        return view('loja/cadastro');
    }

    public function registrar()
    {
        $usuarioModel = new UsuarioModel();
        $dadosFormulario = $this->request->getPost();

        if ($dadosFormulario['senha'] !== $dadosFormulario['confirma_senha']) {
            return redirect()->back()->withInput()->with('validation', [
                'confirma_senha' => 'O campo "Confirmar Senha" deve ser igual ao campo "Senha".'
            ]);
        }

        $emailExistente = $usuarioModel->where('email', $dadosFormulario['email'])->first();
        if ($emailExistente) {
            return redirect()->back()->withInput()->with('validation', [
                'email' => 'O e-mail informado já está registrado.'
            ]);
        }

        if (!$usuarioModel->validate($dadosFormulario)) {
            return redirect()->back()->withInput()->with('validation', $usuarioModel->errors());
        }

        $dadosFormulario['senha'] = password_hash($dadosFormulario['senha'], PASSWORD_BCRYPT);

        unset($dadosFormulario['confirma_senha']);

        $usuarioModel->save($dadosFormulario);

        $email = service('email');

        $dados = [
            'titulo' => 'Olá, tudo certo?',
            'mensagem' => 'Click no botão abaixo pra validar seu e-maiil.',
            'link_text' => 'Validar e-mail',
            'parametro' => $dadosFormulario['email']
        ];

        $mensagem = view('emails/template', $dados);

        $email->setFrom('felipe2006.co@gmail.com', 'Beeuzer');
        $email->setTo($dadosFormulario['email']);
        $email->setSubject('Verificação do e-email');
        $email->setMessage($mensagem);

        $email->send();

        return redirect()->to('login')->with('success', 'Pra completar o cadastro verifique o seu e-mail!');
    }

    public function validaEmail()
    {
        $email = $this->request->getGet('email');

        $usuarioModel = new UsuarioModel();

        $usuario = $usuarioModel->where('email', $email)->first();

        $usuarioModel->update($usuario['id'], [
            'email_verificado' => 1
        ]);

        return redirect()->to('login')->with('success', 'Seu email foi verificado com sucesso!');
    }
}
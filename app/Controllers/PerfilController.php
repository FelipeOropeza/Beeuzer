<?php
namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;
use App\Models\CartaoModel;
use App\Models\PedidoModel;
use \DateTime;

class PerfilController extends Controller
{
    public function index()
    {
        $usuarioId = session()->get('usuario')['id'];

        $usuarioModel = new UsuarioModel();

        $usuario = $usuarioModel->where('id',$usuarioId)->first();

        return view('loja/perfil', ['usuario' => $usuario]);
    }

    public function meusPedidos()
    {
        $usuarioId = session()->get('usuario')['id'];
        $enderecoData = session()->get('endereco');

        $pedidoModel = new PedidoModel();

        $pedidos = $pedidoModel->getPedidos($usuarioId);

        foreach ($pedidos as &$pedido) {
            if (is_null($pedido['pagamento'])) {
                $pedido['status_pedido'] = 'Pendente';
            } else {
                $pedido['status_pedido'] = 'Aprovado';
            }

            $data = $pedido['datapedido'];
            $dataFormatada = DateTime::createFromFormat('Y-m-d', $data)->format('d/m/Y');
            $pedido['datapedido'] = $dataFormatada;
        }

        return view('loja/meus-pedidos', ['pedidos' => $pedidos, 'endereco' => $enderecoData]);
    }

    public function meusCartoes()
    {
        $cartaoModel = new CartaoModel();

        $cartoes = $cartaoModel->where('user_id', session()->get('usuario')['id'])
            ->where('status', 'Ativo')
            ->findAll();

        return view('loja/meus-cartoes', ['cartoes' => $cartoes]);
    }

    public function cadastrarCartao()
    {
        $cartaoModel = new CartaoModel();

        $postData = $this->request->getPost();

        if (!$cartaoModel->validate($postData)) {
            return redirect()->back()->withInput()->with('validation', $cartaoModel->errors());
        }

        $validade = $postData['validade'] . '-01';

        $cartaoModel->insert([
            'user_id' => session()->get('usuario')['id'],
            'numero_cartao' => $postData['numero_cartao'],
            'nome_titular' => $postData['nome_titular'],
            'validade' => $validade,
            'cvv' => $postData['cvv'],
            'tipo_cartao' => $postData['tipo_cartao'],
            'status' => 'Ativo'
        ]);

        return redirect()->to('perfil/meus_cartoes');
    }

    public function excluirCartao($id)
    {
        $cartaoModel = new CartaoModel();

        $cartaoModel->update($id, [
            'status' => 'Inativo'
        ]);

        return redirect()->to('perfil/meus_cartoes');
    }
}
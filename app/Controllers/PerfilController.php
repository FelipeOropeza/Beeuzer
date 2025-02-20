<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CartaoModel;
use App\Models\PedidoModel;

class PerfilController extends Controller
{
    public function index()
    {
        return view('loja/perfil');
    }

    public function meusPedidos()
    {
        $usuarioId = session()->get('usuario')['id'];

        $pedidoModel = new PedidoModel();

        $pedidos = $pedidoModel->getPedidos($usuarioId);

        foreach ($pedidos as &$pedido) {
            if (is_null($pedido['pagamento'])) {
                $pedido['status_pedido'] = 'Pendente';
            } else {
                $pedido['status_pedido'] = 'Aprovado';
            }
        }

        return view('loja/meus-pedidos', ['pedidos' => $pedidos]);
    }

    public function meusCartoes()
    {
        $cartaoModel = new CartaoModel();

        $cartoes = $cartaoModel->where('user_id', session()->get('usuario')['id'])->findAll();

        return view('loja/meus-cartoes', ['cartoes' => $cartoes]);
    }

    public function cadastrarCartao()
    {
        $cartaoModel = new CartaoModel();

        $postData = $this->request->getPost();

        $validade = $postData['validade'] . '-01';

        $cartaoModel->insert([
            'user_id' => session()->get('usuario')['id'],
            'numero_cartao' => $postData['numero_cartao'],
            'nome_titular' => $postData['nome_titular'],
            'validade' => $validade,
            'tipo_cartao' => $postData['tipo_cartao'],
            'status' => 'Ativo'
        ]);

        return redirect()->to('/usuario/perfil/meus_cartoes');
    }

    public function excluirCartao($id)
    {
        $cartaoModel = new CartaoModel();

        $cartaoModel->delete($id);

        return redirect()->to('/usuario/perfil/meus_cartoes');
    }
}
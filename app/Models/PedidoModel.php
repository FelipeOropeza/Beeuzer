<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'totalpedido', 'datapedido'];

    public function getPedidos($usuarioId)
    {
        return $this->select('pedidos.id, pedidos.totalpedido, cartoes.id as cartao, pagamentos.pedido_id as pagamento')
            ->join('pagamentos', 'pagamentos.pedido_id = pedidos.id', 'left')
            ->join('cartoes', 'cartoes.id = pagamentos.cartao_id', 'left')
            ->where('pedidos.user_id', $usuarioId)
            ->get()
            ->getResultArray();
    }
}
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
        return $this->select('
            pedidos.id, 
            pedidos.totalpedido, 
            pedidos.datapedido,
            cartoes.id as cartao, 
            CONCAT(
                cartoes.nome_titular, " - ", 
                pagamentos.metodo_pagamento
            ) AS metodo_pagamento_completo, 
            enderecospagamentos.endereco_id as endereco, 
            pagamentos.pedido_id as pagamento, 
            CONCAT(
                enderecos.rua, ", ", 
                enderecos.cidade, "-", 
                enderecos.estado, " ,", 
                enderecospagamentos.numeroEndereco, " ", 
                enderecospagamentos.complemento, ", ", 
                enderecos.cep
            ) AS endereco_completo
        ')
            ->join('pagamentos', 'pagamentos.pedido_id = pedidos.id', 'left')
            ->join('cartoes', 'cartoes.id = pagamentos.cartao_id', 'left')
            ->join('enderecospagamentos', 'enderecospagamentos.pagamento_id = pagamentos.id', 'left')
            ->join('enderecos', 'enderecos.id = enderecospagamentos.endereco_id', 'left') // Join com a tabela de endereços
            ->where('pedidos.user_id', $usuarioId)
            ->get()
            ->getResultArray();
    }
}
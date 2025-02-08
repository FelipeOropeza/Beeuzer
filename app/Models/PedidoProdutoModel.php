<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoProdutoModel extends Model
{
    protected $table = 'itens_pedidos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['valoritem', 'quantidade', 'totalprod', 'pedido_id', 'produtos_variacoes_id'];
}
<?php
namespace App\Models;

use CodeIgniter\Model;

class CarrinhoModel extends Model
{
    protected $table = 'carrinho';
    protected $primaryKey = 'id';
    protected $allowedFields = ['produtos_variacoes_id', 'quantidade', 'user_id'];

    public function getCarrinhoDetalhado($user_id)
    {
        return $this->select(
            ' produtos_variacoes.id AS produtos_variacoes_id,
                carrinho.id AS id_carrinho,
                produtos.nome, 
                produtos.preco, 
                tamanhos.descricao AS tamanho, 
                cores.nome AS cor, 
                carrinho.quantidade, 
                SUM(produtos.preco * carrinho.quantidade) AS total'
        )
            ->join('produtos_variacoes', 'produtos_variacoes.id = carrinho.produtos_variacoes_id')
            ->join('produtos', 'produtos.id = produtos_variacoes.produto_id')
            ->join('tamanhos', 'tamanhos.id = produtos_variacoes.tamanho_id')
            ->join('cores', 'cores.id = produtos_variacoes.cor_id')
            ->where('carrinho.user_id', $user_id)
            ->groupBy('id_carrinho, produtos.id, tamanhos.id, cores.id, carrinho.quantidade')
            ->findAll();
    }
}
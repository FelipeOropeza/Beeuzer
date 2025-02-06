<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoVariacaoModel extends Model
{
    protected $table = 'produtos_variacoes';
    protected $primaryKey = 'id';

    protected $allowedFields = ['produto_id', 'cor_id', 'tamanho_id'];

    protected $useTimestamps = true;


    public function getVariaçõesProduto()
    {
        return $this->select('produtos_variacoes.id, produtos.nome, produtos.preco, cores.nome AS cor, tamanhos.descricao AS tamanho')
            ->join('produtos', 'produtos.id = produtos_variacoes.produto_id')
            ->join('cores', 'cores.id = produtos_variacoes.cor_id')
            ->join('tamanhos', 'tamanhos.id = produtos_variacoes.tamanho_id')
            ->findAll();
    }

    public function getVariacaoProduto($produto_id, $cor_id, $tamanho_id)
    {
        return $this->select('produtos_variacoes.id')->where('produto_id', $produto_id)
            ->where('tamanho_id', $tamanho_id)
            ->where('cor_id', $cor_id)
            ->first();
    }
}

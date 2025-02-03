<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoModel extends Model
{
    protected $table      = 'produtos';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nome', 'preco', 'cor_id', 'tamanho_id', 'imagem', 'created_at', 'updated_at']; // Adicionado 'imagem'

    protected $useTimestamps = true;

    protected $validationRules = [
        'nome'       => 'required|max_length[100]',
        'preco'      => 'required|decimal',
        'cor_id'     => 'required|is_natural_no_zero',
        'tamanho_id' => 'required|is_natural_no_zero',
        'imagem'     => 'permit_empty|valid_url', // Valida se é uma URL válida
    ];

    protected $validationMessages = [
        'nome' => [
            'required' => 'O nome do produto é obrigatório.',
            'max_length' => 'O nome do produto não pode ter mais de 100 caracteres.',
        ],
        'preco' => [
            'required' => 'O preço do produto é obrigatório.',
            'decimal' => 'O preço deve ser um valor decimal válido.',
        ],
        'cor_id' => [
            'required' => 'A cor do produto é obrigatória.',
            'is_natural_no_zero' => 'A cor deve ser um ID válido.',
        ],
        'tamanho_id' => [
            'required' => 'O tamanho do produto é obrigatório.',
            'is_natural_no_zero' => 'O tamanho deve ser um ID válido.',
        ],
        'imagem' => [
            'valid_url' => 'O campo imagem deve conter uma URL válida.',
        ],
    ];
}

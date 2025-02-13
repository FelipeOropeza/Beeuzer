<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoModel extends Model
{
    protected $table      = 'produtos';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nome', 'descricao', 'preco', 'imagem'];

    protected $validationRules = [
        'nome'       => 'required|max_length[100]',
        'descricao'  => 'required|max_length[255]',
        'preco'      => 'required|decimal',
        'imagem'     => 'permit_empty|valid_url',
    ];

    protected $validationMessages = [
        'nome' => [
            'required' => 'O nome do produto é obrigatório.',
            'max_length' => 'O nome do produto não pode ter mais de 100 caracteres.',
        ],
        'descricao' => [
            'required' => 'A descrição do produto é obrigatória.',
            'max_length' => 'A descrição do produto não pode ter mais de 255 caracteres.',
        ],
        'preco' => [
            'required' => 'O preço do produto é obrigatório.',
            'decimal' => 'O preço deve ser um valor decimal válido.',
        ],
        'imagem' => [
            'valid_url' => 'O campo imagem deve conter uma URL válida.',
        ],
    ];
}

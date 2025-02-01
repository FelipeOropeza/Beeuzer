<?php

namespace App\Models;

use CodeIgniter\Model;

class TamanhoModel extends Model
{
    // Define a tabela associada à model
    protected $table = 'tamanhos';

    // Define a chave primária da tabela
    protected $primaryKey = 'id';

    // Define os campos que podem ser inseridos ou atualizados (evita SQL Injection)
    protected $allowedFields = ['descricao'];

    // Define as configurações de timestamp (opcional)
    protected $useTimestamps = true;

    // Define o formato dos campos de data (opcional, mas recomendado)
    protected $dateFormat = 'datetime';

    // Caso queira adicionar validação dos campos:
    protected $validationRules = [
        'descricao' => 'required|max_length[3]',
    ];

    // Caso queira adicionar mensagens customizadas para a validação:
    protected $validationMessages = [
        'descricao' => [
            'required' => 'O campo descrição é obrigatório.',
            'max_length' => 'A descrição não pode ter mais que 3 caracteres.',
        ],
    ];
}

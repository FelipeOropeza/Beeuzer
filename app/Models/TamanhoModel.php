<?php

namespace App\Models;

use CodeIgniter\Model;

class TamanhoModel extends Model
{
    protected $table = 'tamanhos';

    protected $primaryKey = 'id';

    protected $allowedFields = ['descricao'];

    protected $useTimestamps = true;

    protected $validationRules = [
        'descricao' => 'required|max_length[3]',
    ];

    protected $validationMessages = [
        'descricao' => [
            'required' => 'O campo descrição é obrigatório.',
            'max_length' => 'A descrição não pode ter mais que 3 caracteres.',
        ],
    ];
}
